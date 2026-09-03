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

        $query = function ($q) use ($search) {
            if ($search !== '') {
                $q->where(function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('description', 'like', "%{$search}%");
                });
            }  
        };

        $vegetables  = Vegetable::latest()->when($search, $query)->get();
        $fruits      = Fruit::latest()->when($search, $query)->get();
        $freshNuts   = FreshNut::latest()->when($search, $query)->get();
        $animalFarms = Farm_Animal::latest()->when($search, $query)->get();
        $eggs        = Egg::latest()->when($search, $query)->get();

        return view('pages.shoppage', compact(
            'vegetables',
            'fruits',
            'freshNuts',
            'animalFarms',
            'eggs',
            'search'
        ));
    }
}