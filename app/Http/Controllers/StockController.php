<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Farm_Animal;
use App\Models\FreshNut;
use App\Models\Fruit;
use App\Models\Vegetable;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $status = $request->input('status', '');

        $products = collect();

        // Vegetables
        Vegetable::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->get(['name', 'category', 'qty as stock', 'category as category'])
            ->each(fn($p) => $products->push($p));

        // Fruit
        Fruit::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->get(['name', 'category', 'qty as stock', 'category as category'])
            ->each(fn($p) => $products->push($p));

        // Fresh Nut
        FreshNut::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->get(['name', 'category', 'qty as stock', 'category as category'])
            ->each(fn($p) => $products->push($p));

        // Egg
        Egg::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->get(['name', 'category', 'qty as stock', 'category as category'])
            ->each(fn($p) => $products->push($p));

        // Farm Animals
        Farm_Animal::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->get(['name', 'category', 'qty as stock', 'category as category'])
            ->each(fn($p) => $products->push($p));

        // Filter by status
        if ($status === 'in_stock') {
            $products = $products->filter(fn($p) => $p->stock > 5);
        } elseif ($status === 'low_stock') {
            $products = $products->filter(fn($p) => $p->stock > 0 && $p->stock <= 5);
        } elseif ($status === 'out_stock') {
            $products = $products->filter(fn($p) => $p->stock <= 0);
        }

        $totalProducts = $products->count();
        $inStock      = $products->filter(fn($p) => $p->stock > 5)->count();
        $lowStock     = $products->filter(fn($p) => $p->stock > 0 && $p->stock <= 5)->count();
        $outOfStock   = $products->filter(fn($p) => $p->stock <= 0)->count();

        return view('pages.setting', compact(
            'products', 'totalProducts', 'inStock', 'lowStock', 'outOfStock'
        ));
    }
}