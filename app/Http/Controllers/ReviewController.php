<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Get reviews for one product.
     */
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
            'reviews' => $reviews,
        ]);
    }


    /**
     * Customer Review Report
     */
    public function report()
    {
        $reviews = Review::latest()->get();

        $averageRating = round(
            (float) $reviews->avg('rating'),
            1
        );

        $starCounts = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | Avoid division by zero
        |--------------------------------------------------------------------------
        */
        $total = $reviews->count();

        /*
        |--------------------------------------------------------------------------
        | Product statistics
        |--------------------------------------------------------------------------
        */
        $byProduct = $reviews
            ->groupBy('product_type')
            ->map(function ($items) {

                return [
                    'count' => $items->count(),

                    'average' => round(
                        (float) $items->avg('rating'),
                        1
                    ),
                ];
            });


        return view(
            'report.report',
            compact(
                'reviews',
                'averageRating',
                'byProduct',
                'starCounts',
                'total'
            )
        );
    }


    /**
     * Store customer review.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'user_name' => [
                'nullable',
                'string',
                'max:100'
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],

            'comment' => [
                'required',
                'string',
                'max:1000'
            ],

            'product_type' => [
                'required',
                'string',
                'max:50'
            ],

            'product_id' => [
                'required',
                'integer'
            ],
        ]);


        $data['user_name'] =
            $data['user_name'] ?? 'Anonymous';


        Review::create($data);


        return response()->json([
            'success' => true,
            'message' => 'Review added successfully.'
        ]);
    }


    /**
     * Delete ANY review.
     *
     * 1 star  -> can delete
     * 2 stars -> can delete
     * 3 stars -> can delete
     * 4 stars -> can delete
     * 5 stars -> can delete
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | NO RATING RESTRICTION
        |--------------------------------------------------------------------------
        */
        $review->delete();


        return back()->with(
            'success',
            'Customer review deleted successfully.'
        );
    }


    /**
     * Reply to ANY review.
     *
     * 1 star  -> can reply
     * 2 stars -> can reply
     * 3 stars -> can reply
     * 4 stars -> can reply
     * 5 stars -> can reply
     */
    public function reply(Request $request, $id)
    {
        $request->validate([

            'admin_reply' => [
                'required',
                'string',
                'max:1000'
            ],

        ]);


        $review = Review::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | NO RATING RESTRICTION
        |--------------------------------------------------------------------------
        */
        $review->admin_reply =
            $request->admin_reply;

        $review->replied_at =
            now();


        $review->save();


        return back()->with(
            'success',
            'Your reply was sent successfully.'
        );
    }
}