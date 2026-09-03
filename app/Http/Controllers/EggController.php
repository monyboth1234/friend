<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EggController extends Controller
{
    // =========================
    // READ
    // =========================
    public function index()
    {
        $eggs = Egg::latest()->get();

        // count eggs
        $totalEgg = Egg::sum('qty');

        return view('category.Egg', compact('eggs', 'totalEgg'));
    }


    // =========================
    // CREATE
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

        $egg = new Egg();

        $egg->name = $request->name;
        $egg->price = $request->price;
        $egg->qty = $request->qty;
        $egg->description = $request->description;

        // Cloudinary Upload
        if ($request->hasFile('image')) {

            $result = $request->file('image')
                ->storeOnCloudinary('farm/eggs');

            $egg->image = $result->getSecurePath();
            $egg->image_public_id = $result->getPublicId();
        }

        $egg->save();

        return redirect()
            ->route('Egg')
            ->with('success', 'Egg added successfully!');
    }


    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'price'       => 'required|numeric|min:0',
        'qty'         => 'required|integer|min:0',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'description' => 'nullable|string',
    ]);

    $vegetable = Egg::findOrFail($id);
    $vegetable->name        = $request->name;
    $vegetable->price       = $request->price;
    $vegetable->qty         = $request->qty;
    $vegetable->description = $request->description;

    // Cloudinary Image Upload (ប្រសិនបើមាន)
    if ($request->hasFile('image')) {
        if (!empty($vegetable->image_public_id)) {
            try {
                Cloudinary::destroy($vegetable->image_public_id);
            } catch (\Exception $e) {}
        }

        $uploadedFile = $request->file('image')->storeOnCloudinary('farm/vegetables');
        $vegetable->image = $uploadedFile->getSecurePath();
        $vegetable->image_public_id = $uploadedFile->getPublicId() ?? pathinfo($uploadedFile->getSecurePath(), PATHINFO_FILENAME);
    }

    $vegetable->save();

    return redirect()
        ->route('Egg')
        ->with('success', 'កែប្រែ Vegetable បានជោគជ័យ!');
}


    // =========================
    // DELETE
    // =========================
    public function destroy(Egg $egg)
    {
        // Delete Cloudinary image
        if ($egg->image_public_id) {
            Cloudinary::destroy($egg->image_public_id);
        }

        $egg->delete();

        return redirect()
            ->route('Egg')
            ->with('success', 'Egg deleted successfully!');
    }
}