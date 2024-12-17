<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use App\Models\Types;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Menangani filter berdasarkan nama gitar dan jenis
        $query = Guitar::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('brand')) {
            $query->where('brand', 'like', '%' . $request->input('brand') . '%');
        }

        // Pagination dengan 10 item per halaman
        $guitars = $query->paginate(10);

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
            'image_url' => 'nullable|file|image|mimes:jpeg,png,jpg|max:4096',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type_description' => 'required|string|max:255',
        ]);
    
        $imageData = null;
        if ($request->hasFile('image_url')) {
            $imageData = file_get_contents($request->file('image_url')->getRealPath());
        }
    
        Guitar::create([
            'id_list' => $validated['id_list'],
            'name' => $validated['name_type'],
            'description' => $validated['description'],
            'image_url' => $imageData,
            'brand' => $validated['brand'],
            'price' => $validated['price'],
        ]);
    
        Types::create([
            'id_type' => $validated['id_list'],
            'type_name' => $validated['name_type'],
            'type_description' => $validated['type_description'],
        ]);
    
        return redirect()->route('admin.guitars')->with('success', 'Data saved successfully!');
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
            'image_url' => 'nullable|file|image|mimes:jpeg,png,jpg|max:4096',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type_description' => 'required|string|max:255',
        ]);
    
        $guitar = Guitar::where('id_list', $id)->firstOrFail();
    
        if ($request->hasFile('image_url')) {
            $guitar->image_url = file_get_contents($request->file('image_url')->getRealPath());
        }
    
        $guitar->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
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
        $guitar = Guitar::where('id_list', $id)->firstOrFail();

        // Hapus file gambar jika ada
        if ($guitar->image_url && Storage::exists('public/' . $guitar->image_url)) {
            Storage::delete('public/' . $guitar->image_url);
        }

        $guitar->delete();
        Types::where('id_type', $id)->delete();

        return redirect()->route('admin.guitars')->with('success', 'Data successfully deleted!');
    }

    public function show($id)
    {
        $guitar = Guitar::where('id_list', $id)->firstOrFail();
        $guitarTypes = Types::where('id_list', $id)->get();

        return view('frontpage.about', compact('guitar', 'guitarTypes'));
    }
}
