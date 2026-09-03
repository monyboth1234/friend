<?php

namespace App\Http\Controllers;

use App\Models\Farm_Animal;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FarmAnimalController extends Controller
{
    // =========================
    // READ - Show Farm Animals
    // =========================
    public function index()
    {
        $farmAnimals = Farm_Animal::latest()->get();

        $totalAnimal = Farm_Animal::sum('qty');


        return view('category.Farm_Animals', compact('farmAnimals', 'totalAnimal'));
    }


    // =========================
    // CREATE - Store Farm Animal
    // =========================
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        $imageUrl = null;
        $imagePublicId = null;

        // =========================
        // Upload Image to Cloudinary
        // =========================
        if ($request->hasFile('image')) {

            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'farm_animals'
                ]
            );

            $imageUrl = $uploadedFile->getSecurePath();
            $imagePublicId = $uploadedFile->getPublicId();
        }

        // =========================
        // Save to Database
        // =========================
        Farm_Animal::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imageUrl,
            'image_public_id' => $imagePublicId,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('Farm_Animals')
            ->with('success', 'បានបន្ថែម Farm Animal ជោគជ័យ!');
    }


    // =========================
    // EDIT - Show Edit Form
    // =========================
    public function edit($id)
    {
        $farmAnimal = Farm_Animal::findOrFail($id);

        return view('category.Farm_Animals_edit', compact('farmAnimal'));
    }


    // =========================
    // UPDATE - Update Farm Animal
    // =========================
    public function update(Request $request, $id)
    {
        $farmAnimal = Farm_Animal::findOrFail($id);

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        // =========================
        // Update Image
        // =========================
        if ($request->hasFile('image')) {

            // Delete old image from Cloudinary
            if ($farmAnimal->image_public_id) {
                Cloudinary::destroy(
                    $farmAnimal->image_public_id
                );
            }

            // Upload new image
            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'farm_animals'
                ]
            );

            $farmAnimal->image = $uploadedFile->getSecurePath();
            $farmAnimal->image_public_id = $uploadedFile->getPublicId();
        }

        // =========================
        // Update Data
        // =========================
        $farmAnimal->name = $request->name;
        $farmAnimal->price = $request->price;
        $farmAnimal->qty = $request->qty;
        $farmAnimal->description = $request->description;

        $farmAnimal->save();

        return redirect()
            ->route('Farm_Animals')
            ->with('success', 'បានកែប្រែ Farm Animal ជោគជ័យ!');
    }


    // =========================
    // DELETE - Delete Farm Animal
    // =========================
    public function destroy($id)
    {
        $farmAnimal = Farm_Animal::findOrFail($id);

        // =========================
        // Delete Image from Cloudinary
        // =========================
        if ($farmAnimal->image_public_id) {

            Cloudinary::destroy(
                $farmAnimal->image_public_id
            );
        }

        // =========================
        // Delete Database Record
        // =========================
        $farmAnimal->delete();

        return redirect()
            ->route('Farm_Animals')
            ->with('success', 'បានលុប Farm Animal ជោគជ័យ!');
    }
}