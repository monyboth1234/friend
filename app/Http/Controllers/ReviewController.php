<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(string $type, int $id)
    {
        $reviews = Review::query()
            ->where('product_type', $type)
            ->where('product_id', $id)
            ->latest()
            ->get();

        return response()->json([
            'total_reviews' => $reviews->count(),
            'average_rating' => round((float) $reviews->avg('rating'), 1),
            'reviews'       => $reviews,
        ]);
    }

    public function report()
    {
        $reviews = Review::latest()->get();

        $averageRating = round((float) $reviews->avg('rating'), 1);

        $starCounts = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];

        $total = $reviews->count() ?: 1;

        $byProduct = $reviews->groupBy('product_type')
            ->map(fn ($items) => [
                'count' => $items->count(),
                'average' => round((float) $items->avg('rating'), 1),
            ]);

        return view('report.report', compact(
            'reviews',
            'averageRating',
            'byProduct',
            'starCounts',
            'total'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_name'    => 'nullable|string|max:100',
            'rating'       => 'required|integer|min:1|max:5',
            'comment'      => 'required|string|max:1000',
            'product_type' => 'required|string|max:50',
            'product_id'   => 'required|integer',
        ]);

        $data['user_name'] = $data['user_name'] ?? 'Anonymous';

        Review::create($data);

        return response()->json(['success' => true]);
    }
}
