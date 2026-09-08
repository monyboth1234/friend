<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Farm_Animal;
use App\Models\FreshNut;
use App\Models\Fruit;
use App\Models\User;
use App\Models\Vegetable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'chart_period' => ['nullable', 'in:day,month,year'],
        ]);

        $users = User::all();
        $chartPeriod = $request->input('chart_period', 'month');
        $chart = $this->inventoryChartData($chartPeriod);

        return view('dashboard', compact('users', 'chartPeriod', 'chart'));
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
}
