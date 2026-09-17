<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use App\Models\Fruit;
use App\Models\FreshNut;
use App\Models\Egg;
use App\Models\Farm_Animal;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $category = $request->query('category');

        $filterProducts = function ($query) use ($search) {
            $query->where(function ($productQuery) use ($search) {
                $productQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        };

        $vegetables  = Vegetable::latest()->when($search !== '', $filterProducts)->get();
        $fruits      = Fruit::latest()->when($search !== '', $filterProducts)->get();
        $freshNuts   = FreshNut::latest()->when($search !== '', $filterProducts)->get();
        $animalFarms = Farm_Animal::latest()->when($search !== '', $filterProducts)->get();
        $eggs        = Egg::latest()->when($search !== '', $filterProducts)->get();

        return view('pages.shoppage', compact(
            'vegetables',
            'fruits',
            'freshNuts',
            'animalFarms',
            'eggs',
            'search',
            'category'
        ));
    }
}
