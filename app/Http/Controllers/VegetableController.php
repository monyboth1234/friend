<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class VegetableController extends Controller
{
    // =========================
    // READ - Show Vegetables
    // =========================
    public function index()
    {
        $vegetables = Vegetable::latest()->get();

        $totalVegetable = Vegetable::sum('qty');

        return view('category.Vegetable', compact(
            'vegetables',
            'totalVegetable'
        ));
    }


    // =========================
    // CREATE - Store Vegetable
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

        $imageUrl = null;
        $imagePublicId = null;

        // Upload image to Cloudinary
        if ($request->hasFile('image')) {

            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'vegetables'
                ]
            );

            $imageUrl = $uploadedFile->getSecurePath();
            $imagePublicId = $uploadedFile->getPublicId();
        }

        // Save database
        Vegetable::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imageUrl,
            'image_public_id' => $imagePublicId,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('vegetable')
            ->with('success', 'បានបន្ថែម Vegetable ជោគជ័យ!');
    }


    // =========================
    // EDIT - Show Edit Page
    // =========================
    public function edit($id)
    {
        $vegetable = Vegetable::findOrFail($id);

        return view(
            'category.Vegetable_edit',
            compact('vegetable')
        );
    }


    // =========================
    // UPDATE - Update Vegetable
    // =========================
    public function update(Request $request, $id)
    {
        $vegetable = Vegetable::findOrFail($id);

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
            if ($vegetable->image_public_id) {

                Cloudinary::destroy(
                    $vegetable->image_public_id
                );
            }

            // Upload new image
            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'vegetables'
                ]
            );

            $vegetable->image = $uploadedFile->getSecurePath();
            $vegetable->image_public_id = $uploadedFile->getPublicId();
        }

        // Update information
        $vegetable->name = $request->name;
        $vegetable->price = $request->price;
        $vegetable->qty = $request->qty;
        $vegetable->description = $request->description;

        $vegetable->save();

        return redirect()
            ->route('vegetable')
            ->with('success', 'បានកែប្រែ Vegetable ជោគជ័យ!');
    }


    // =========================
    // DELETE - Delete Vegetable
    // =========================
    public function destroy($id)
    {
        $vegetable = Vegetable::findOrFail($id);

        // Delete image from Cloudinary
        if ($vegetable->image_public_id) {

            Cloudinary::destroy(
                $vegetable->image_public_id
            );
        }

        // Delete database record
        $vegetable->delete();

        return redirect()
            ->route('vegetable')
            ->with('success', 'បានលុប Vegetable ជោគជ័យ!');
    }
}