<?php

namespace App\Http\Controllers;

use App\Models\arable_land;
use Illuminate\Http\Request;


class ArableLandController extends Controller
{
    // index
    public function index(){
        $arableLand = arable_land::latest()->get();

        $totalArea = arable_land::sum('area');

        $totalLand = arable_land::count();
        

        return view('Arable_land.Arable_lands', compact(
            'arableLand', 'totalArea', 'totalLand'
        ));
    }

    // create and store
    public function store (Request $request) {
        $request -> validate([
            'name' => 'required|string|max:225',
            'area' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'location' => 'nullable|string|max:225',
            'description' => 'nullable|string',
        ]);

        arable_land::create([
            'name' => $request->name,
            'area' => $request->area,
            'unit' => $request->unit,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()
                ->route('Arable_lands')
                ->with('success', 'បានបន្ថែមផ្ទៃដីដោយជោគជ័យ!');
    }

    // function delete
    public function destroy($id){
        $land = arable_land::findOrFail($id);
        $land->delete();

        return redirect()->route('Arable_lands')
                        ->with('success', 'Delete Successfully!');
    }
}

    
