<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use App\Models\Fruit;
use App\Models\FreshNut;
use App\Models\AnimalFarm;
use App\Models\Egg;
use App\Models\Farm_Animal;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $vegetables  = Vegetable::latest()->get();
        $fruits      = Fruit::latest()->get();
        $freshNuts   = FreshNut::latest()->get();
        $animalFarms = Farm_Animal::latest()->get();
        $eggs        = Egg::latest()->get();

        return view('pages.homepage', compact(
            'vegetables',
            'fruits',
            'freshNuts',
            'animalFarms',
            'eggs'
        ));
    }
}