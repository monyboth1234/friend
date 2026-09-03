<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class SalesController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $today = date('Y-m-d');

       
        // ១. ទាញយកបញ្ជីកុម្ម៉ង់ទាំងអស់ 

        $orders = Order::select('customer_name', 'customer_email', 'category', 'item_name', 'quantity', 'total_price')
            ->latest()
            ->get();


        // ២. ទាញទិន្នន័យប្រចាំថ្ងៃ (កែពី 'farm__animals' មកជា 'farm_animals')

        $dailySales = [
            'vegetable'  => DB::table('vegetables')->whereDate('created_at', $today)->sum('qty'),
            'fresh_nut'  => DB::table('fresh_nuts')->whereDate('created_at', $today)->sum('qty'),
            'fruit'      => DB::table('fruits')->whereDate('created_at', $today)->sum('qty'),
            'egg'        => DB::table('eggs')->whereDate('created_at', $today)->sum('qty'),
            'farmanimal' => DB::table('farm__animals')->whereDate('created_at', $today)->sum('qty'),
        ];

        $dailySalesChartData = array_values($dailySales);


        // ៣. ទាញទិន្នន័យប្រចាំខែសម្រាប់ Line Chart

        $tables = [
            'vegetable'  => 'vegetables',
            'fresh_nut'  => 'fresh_nuts',
            'fruit'      => 'fruits',
            'egg'        => 'eggs',
            'farmanimal' => 'farm__animals',
        ];

        $monthlySales = [];

        foreach ($tables as $key => $tableName) {
            $monthlyData = array_fill(1, 12, 0);

            $salesFromDb = DB::table($tableName)
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(qty) as total_qty'))
                ->whereYear('created_at', $currentYear)
                ->groupBy('month')
                ->pluck('total_qty', 'month')
                ->toArray();

            foreach ($salesFromDb as $month => $qty) {
                $monthlyData[$month] = (int) $qty;
            }

            $monthlySales[$key] = array_values($monthlyData);
        }


        // ៤. ផ្ញើទិន្នន័យទៅកាន់ Blade View

        return view('pages.sales-report', compact('orders', 'dailySalesChartData', 'monthlySales'));
    }
}