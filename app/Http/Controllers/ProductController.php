<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use App\Models\Fruit;
use App\Models\FreshNut;
use App\Models\Egg;
use App\Models\Farm_Animal;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $type = $request->query('type');

        $product = match ($type) {

            'vegetable' => Vegetable::findOrFail($id),

            'fruit' => Fruit::findOrFail($id),

            'freshnut' => FreshNut::findOrFail($id),

            'egg' => Egg::findOrFail($id),

            'farmanimal' => Farm_Animal::findOrFail($id),

            default => abort(404),
        };

        return view('detail.product-detail', compact(
            'product',
            'type'
        ));
    }
}
