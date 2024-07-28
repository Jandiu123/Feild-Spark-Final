<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'care' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public');
        }

        Plant::create([
            'name' => $request->input('name'),
            'origin' => $request->input('origin'),
            'care' => $request->input('care'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('pages.instructorplant')->with('success', 'Plant added successfully.');
    }

    public function index()
    {
       $plants = Plant::all();
       return view('pages.plantinfo', compact('plants'));
    }
    public function show($id)
    {
       $plant = Plant::findOrFail($id);
       return view('pages.plantdetail', compact('plant'));
    }
    public function newPage()
    {
        $plants = Plant::all();
        return view('pages.plants', compact('plants'));
    }
    
}

