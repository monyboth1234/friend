<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Models\Farm_Animal;
use App\Models\FreshNut;
use App\Models\Fruit;
use App\Models\Vegetable;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected function key(string $type, int|string $id): string
    {
        return $type . '_' . $id;
    }

    public function count()
    {
        $cart = session()->get('cart', []);
        $count = collect($cart)->sum('quantity');

        return response()->json(['count' => $count]);
    }

    public function clear()
    {
        session()->forget('cart');

        return response()->json(['success' => true]);
    }

    /**
     * Try to find an item across known product models so the
     * generic `.add-to-cart` button in shoppage can resolve any of them.
     */
    protected function findProduct(int $id, string $preferType = null)
    {
        $candidates = [
            'vegetable'   => Vegetable::class,
            'farmanimal'  => Farm_Animal::class,
            'freshnut'    => FreshNut::class,
            'egg'         => Egg::class,
        ];

        if ($preferType && isset($candidates[$preferType])) {
            $model = $candidates[$preferType]::find($id);
            if ($model) return $model;
        }

        foreach ($candidates as $class) {
            $model = $class::find($id);
            if ($model) return $model;
        }

        return null;
    }

    protected function addToCart(string $type, int $id, array $item): array
    {
        $cart = session()->get('cart', []);
        $key  = $this->key($type, $id);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = ($cart[$key]['quantity'] ?? 1) + 1;
        } else {
            $cart[$key] = array_merge([
                'name'     => '',
                'price'    => 0,
                'quantity' => 1,
                'image'    => '',
            ], $item);
        }

        session()->put('cart', $cart);

        return [
            'success' => true,
            'count'   => collect($cart)->sum('quantity'),
        ];
    }

    public function add(Request $request, int $id)
    {
        $product = $this->findProduct($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        return response()->json($this->addToCart('product', $id, [
            'name'  => $product->name ?? '',
            'price' => (float) ($product->price ?? 0),
            'image' => $product->image ?? '',
        ]));
    }

    public function addFruit(Request $request, int $id)
    {
        $fruit = Fruit::find($id);
        if (!$fruit) {
            return response()->json(['success' => false, 'message' => 'Fruit not found'], 404);
        }

        return response()->json($this->addToCart('fruit', $id, [
            'name'  => $fruit->name ?? '',
            'price' => (float) ($fruit->price ?? 0),
            'image' => $fruit->image ?? '',
        ]));
    }

    public function addJuice(Request $request, int $id)
    {
        // No Juice model exists yet; return a graceful response.
        return response()->json(['success' => false, 'message' => 'Juice products not available'], 404);
    }

    protected function adjust(Request $request, string $type, int|string $id, int $delta): array
    {
        $cart = session()->get('cart', []);
        $key  = $this->key($type, $id);

        if (!isset($cart[$key])) {
            $cart[$key] = ['name' => '', 'price' => 0, 'quantity' => 0, 'image' => ''];
        }

        $cart[$key]['quantity'] = max(0, ($cart[$key]['quantity'] ?? 0) + $delta);

        $removed = false;
        if ($cart[$key]['quantity'] <= 0) {
            unset($cart[$key]);
            $removed = true;
        }

        session()->put('cart', $cart);

        return [
            'success'  => true,
            'quantity' => $cart[$key]['quantity'] ?? 0,
            'count'    => collect($cart)->sum('quantity'),
            'removed'  => $removed,
        ];
    }

    public function increment(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'product', $id, +1));
    }

    public function decrement(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'product', $id, -1));
    }

    public function incrementFruit(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'fruit', $id, +1));
    }

    public function decrementFruit(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'fruit', $id, -1));
    }

    public function incrementJuice(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'juice', $id, +1));
    }

    public function decrementJuice(Request $request, int $id)
    {
        return response()->json($this->adjust($request, 'juice', $id, -1));
    }
}