<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use App\Models\Types;

class AdminController extends Controller
{
    public function index()
    {
        $guitars = Guitar::all();
        return view('admin.guitars', compact('guitars'));
    }

    public function create()
    {
        return view('admin.create-guitar');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_list' => 'required|numeric|unique:guitar_list,id_list',
            'name_type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type_description' => 'required|string|max:255',
        ]);
    
        Guitar::create([
            'id_list' => $validated['id_list'],
            'name' => $validated['name_type'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'brand' => $validated['brand'],
            'price' => $validated['price'],
        ]);
    
        Types::create([
            'id_type' => $validated['id_list'],
            'type_name' => $validated['name_type'],
            'type_description' => $validated['type_description'],
        ]);
    
        return redirect()->route('admin.guitars')->with('success', 'Data saved succesfully!');
    }    

    public function edit($id)
    {
        $guitar = Guitar::where('id_list', $id)->firstOrFail();
    
        $guitarType = Types::where('id_type', $id)->first();
    
        return view('admin.edit-guitar', compact('guitar', 'guitarType'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type_description' => 'required|string|max:255',
        ]);

        $guitar = Guitar::where('id_list', $id)->firstOrFail();
        $guitar->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'brand' => $validated['brand'],
            'price' => $validated['price'],
        ]);

        Types::updateOrCreate(
            ['id_type' => $id],
            [
                'type_name' => $validated['name'],
                'type_description' => $validated['type_description'],
            ]
        );        

        return redirect()->route('admin.guitars')->with('success', 'Data updated successfully!');
    }

    public function destroy($id)
    {
        $guitar = Guitar::findOrFail($id);
        $guitar->delete();
    
        Types::where('id_type', $id)->delete();
    
        return redirect()->route('admin.guitars')->with('success', 'Data has been eliminated!');
    }    

    public function show($id)
    {
        $guitar = Guitar::where('id_list', $id)->firstOrFail();
        $guitarTypes = Types::where('id_list', $id)->get();

        return view('frontpage.about', compact('guitar', 'guitarTypes'));
    }
}
