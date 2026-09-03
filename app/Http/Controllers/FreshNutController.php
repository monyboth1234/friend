<?php

namespace App\Http\Controllers;

use App\Models\FreshNut;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FreshNutController extends Controller
{
    public function index()
    {
        $freshNuts = FreshNut::latest()->get();

        $totalFreshNut = FreshNut::sum('qty');

        return view('category.Fresh_Nut', compact(
            'freshNuts',
            'totalFreshNut'
        ));
    }

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

        if ($request->hasFile('image')) {
            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'farm/fresh_nuts',
                ]
            );

            $imageUrl = $uploadedFile->getSecurePath();
        }

        FreshNut::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imageUrl,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('Fresh_Nut')
            ->with('success', 'បានបន្ថែម Fresh Nut ជោគជ័យ!');
    }

    public function update(Request $request, $id)
    {
        $freshNut = FreshNut::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        $imageUrl = $freshNut->image;

        if ($request->hasFile('image')) {
            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'farm/fresh_nuts',
                ]
            );

            $imageUrl = $uploadedFile->getSecurePath();
        }

        $freshNut->update([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $imageUrl,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('Fresh_Nut')
            ->with('success', 'បានកែប្រែ Fresh Nut ជោគជ័យ!');
    }

    public function destroy($id)
    {
        $freshNut = FreshNut::findOrFail($id);

        $freshNut->delete();

        return redirect()
            ->route('Fresh_Nut')
            ->with('success', 'បានលុប Fresh Nut ជោគជ័យ!');
    }
}