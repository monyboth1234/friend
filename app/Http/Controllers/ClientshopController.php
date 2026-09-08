<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use App\Models\Fruit;
use App\Models\FreshNut;
use App\Models\Egg;
use App\Models\Farm_Animal;
use Illuminate\Http\Request;

class ClientshopController extends Controller
{
    public function shoppage(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $category = $request->query('category');
        $validCategories = ['vegetables', 'fruits', 'fresh-nuts', 'farm-animals', 'eggs', 'juices'];

        if (!in_array($category, $validCategories, true)) {
            $category = null;
        }

        $query = function ($q) use ($search) {
            if ($search !== '') {
                $q->where(function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('description', 'like', "%{$search}%");
                });
            }  
        };

        $vegetables  = Vegetable::latest()->when($search, $query)->when($category && $category !== 'vegetables', fn ($q) => $q->whereRaw('1 = 0'))->get();
        $fruits      = Fruit::latest()->when($search, $query)->when($category && $category !== 'fruits', fn ($q) => $q->whereRaw('1 = 0'))->get();
        $freshNuts   = FreshNut::latest()->when($search, $query)->when($category && $category !== 'fresh-nuts', fn ($q) => $q->whereRaw('1 = 0'))->get();
        $animalFarms = Farm_Animal::latest()->when($search, $query)->when($category && $category !== 'farm-animals', fn ($q) => $q->whereRaw('1 = 0'))->get();
        $eggs        = Egg::latest()->when($search, $query)->when($category && $category !== 'eggs', fn ($q) => $q->whereRaw('1 = 0'))->get();

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
