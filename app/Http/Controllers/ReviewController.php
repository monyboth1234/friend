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
            'reviews'       => $reviews,
        ]);
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