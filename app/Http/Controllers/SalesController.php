<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = date('Y');
        $request->validate([
            'sale_date' => ['nullable', 'date'],
        ]);

        // The daily chart is based on the sale date selected in the report.
        // Default to today when no date has been selected.
        $selectedDate = $request->filled('sale_date')
            ? Carbon::parse($request->input('sale_date'))->toDateString()
            : now()->toDateString();

        // ==========================================
        // 1. All Orders
        // ==========================================

        $orders = Order::select(
            'customer_name',
            'customer_email',
            'category',
            'item_name',
            'quantity',
            'total_price'
        )
        ->latest()
        ->get();


        // ==========================================
        // 2. Daily Sales
        // ==========================================

        $dailySales = [
            'vegetable' => Order::whereDate('created_at', $selectedDate)
                ->where('category', 'Vegetable')
                ->sum('quantity'),

            'fresh_nut' => Order::whereDate('created_at', $selectedDate)
                ->where('category', 'Fresh Nut')
                ->sum('quantity'),

            'fruit' => Order::whereDate('created_at', $selectedDate)
                ->where('category', 'Fruit')
                ->sum('quantity'),

            'egg' => Order::whereDate('created_at', $selectedDate)
                ->where('category', 'Egg')
                ->sum('quantity'),

            'farmanimal' => Order::whereDate('created_at', $selectedDate)
                ->where('category', 'Farm Animal')
                ->sum('quantity'),
        ];

        $dailySalesChartData = array_values($dailySales);


        // ==========================================
        // 3. Monthly Sales
        // ==========================================

        $categories = [
            'vegetable' => 'Vegetable',
            'fresh_nut' => 'Fresh Nut',
            'fruit' => 'Fruit',
            'egg' => 'Egg',
            'farmanimal' => 'Farm Animal',
        ];

        $monthlySales = [];

        foreach ($categories as $key => $category) {

            $monthlyData = array_fill(1, 12, 0);

            $salesFromDb = Order::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('SUM(quantity) as total_qty')
                )
                ->whereYear('created_at', $currentYear)
                ->where('category', $category)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('total_qty', 'month')
                ->toArray();

            foreach ($salesFromDb as $month => $qty) {
                $monthlyData[$month] = (int) $qty;
            }

            $monthlySales[$key] = array_values($monthlyData);
        }


        // ==========================================
        // 4. Return View
        // ==========================================

        return view(
            'pages.sales-report',
            compact(
                'orders',
                'selectedDate',
                'dailySalesChartData',
                'monthlySales'
            )
        );
    }
}
