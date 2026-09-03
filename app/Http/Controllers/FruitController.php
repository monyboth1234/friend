<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FruitController extends Controller
{
    // =========================
    // INDEX
    // =========================

    public function index()
    {
        $fruits = Fruit::latest()->get();

        $totalFruit = Fruit::sum('qty');

        return view('category.Fruit', compact(
            'fruits',
            'totalFruit'
        ));
    }


    // =========================
    // STORE
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        $fruit = new Fruit();

        $fruit->name = $request->name;
        $fruit->price = $request->price;
        $fruit->qty = $request->qty;
        $fruit->description = $request->description;


        // =========================
        // CLOUDINARY IMAGE
        // =========================

        if ($request->hasFile('image')) {

            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'fruits'
                ]
            );

            $fruit->image = $uploadedFile->getSecurePath();
        }


        $fruit->save();

        return redirect()
            ->route('Fruit')
            ->with('success', 'បន្ថែម Fruit បានជោគជ័យ!');
    }


    // =========================
    // UPDATE
    // =========================

    public function update(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        $fruit->name = $request->name;
        $fruit->price = $request->price;
        $fruit->qty = $request->qty;
        $fruit->description = $request->description;


        // =========================
        // UPDATE CLOUDINARY IMAGE
        // =========================

        if ($request->hasFile('image')) {

            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'fruits'
                ]
            );

            $fruit->image = $uploadedFile->getSecurePath();
        }


        $fruit->save();

        return redirect()
            ->route('Fruit')
            ->with('success', 'កែប្រែ Fruit បានជោគជ័យ!');
    }


    // =========================
    // DELETE
    // =========================

    public function destroy($id)
    {
        $fruit = Fruit::findOrFail($id);

        $fruit->delete();

        return redirect()
            ->route('Fruit')
            ->with('success', 'លុប Fruit បានជោគជ័យ!');
    }
}