<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Farm_Animal;
use App\Models\FreshNut;
use App\Models\Fruit;
use App\Models\User;
use App\Models\Vegetable;
use App\Models\arable_land;
use Auth;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'profile_image_public_id' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('profile_image')) {
                if ($user->profile_image_public_id) {
                    Cloudinary::destroy($user->profile_image_public_id);
                }

                $result = $request->file('profile_image')->storeOnCloudinary('farm3/profiles');

                $validated['profile_image'] = $result->getSecurePath();
                $validated['profile_image_public_id'] = $result->getPublicId();
            }

            $user->update($validated);

            return back()->with('success', 'Profile updated successfully.');
        } catch (\Throwable $e) {
            return back()->withErrors(['profile_image' => 'Upload failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function index(Request $request)
    {
        $request->validate([
            'chart_period' => ['nullable', 'in:day,month,year'],
        ]);

        $users = User::all();
        $chartPeriod = $request->input('chart_period', 'month');
        $chart = $this->inventoryChartData($chartPeriod);

        $totalArea = arable_land::sum('area');
        $totalEgg = Egg::sum('qty');
        $totalAnimal = Farm_Animal::sum('qty');
        $totalVegetable = Vegetable::sum('qty');
        $totalFruit = Fruit::sum('qty');
        $totalFreshNut = FreshNut::sum('qty');

        return view('dashboard', compact('users', 'chartPeriod', 'chart', 'totalArea', 'totalEgg', 'totalAnimal', 'totalVegetable', 'totalFruit', 'totalFreshNut'));
    }

    /**
     * Build quantity-added series from the five inventory tables.
     */
    private function inventoryChartData(string $period): array
    {
        [$start, $labels, $dateFormat, $labelFormat] = match ($period) {
            'day' => [
                now()->subDays(6)->startOfDay(),
                collect(range(0, 6))->map(fn ($day) => now()->subDays(6 - $day)->startOfDay()),
                'Y-m-d',
                'd M',
            ],
            'year' => [
                now()->subYears(4)->startOfYear(),
                collect(range(0, 4))->map(fn ($year) => now()->subYears(4 - $year)->startOfYear()),
                'Y',
                'Y',
            ],
            default => [
                now()->startOfYear(),
                collect(range(1, 12))->map(fn ($month) => now()->startOfYear()->addMonths($month - 1)),
                'Y-m',
                'M',
            ],
        };

        $models = [
            'Egg' => Egg::class,
            'Farm Animals' => Farm_Animal::class,
            'Fresh Nut' => FreshNut::class,
            'Fruit' => Fruit::class,
            'Vegetable' => Vegetable::class,
        ];

        $series = [];
        foreach ($models as $name => $model) {
            $totals = $model::query()
                ->where('created_at', '>=', $start)
                ->get(['qty', 'created_at'])
                ->groupBy(fn ($item) => Carbon::parse($item->created_at)->format($dateFormat))
                ->map(fn (Collection $items) => (int) $items->sum('qty'));

            $series[$name] = $labels
                ->map(fn (Carbon $date) => $totals->get($date->format($dateFormat), 0))
                ->values()
                ->all();
        }

        return [
            'labels' => $labels->map(fn (Carbon $date) => $date->format($labelFormat))->all(),
            'series' => $series,
        ];
    }

    /**
     * Register 3 users with a 2-minute interval between each.
     */
    public function registerUsersWithInterval()
    {
        $registered = [];

        for ($i = 1; $i <= 3; $i++) {
            $timestamp = now()->format('Ymd_His');

            $user = User::create([
                'name'              => 'Scheduled_User_' . $i . '_' . $timestamp,
                'email'             => 'scheduled_' . $i . '_' . $timestamp . '@farm3.local',
                'password'          => Hash::make('password'),
                'role'              => 'user',
            ]);

            $registered[] = $user;

            if ($i < 3) {
                sleep(120);
            }
        }

        return response()->json([
            'message'     => '3 users registered with 2-minute intervals',
            'registered'  => $registered,
        ]);
    }
}
