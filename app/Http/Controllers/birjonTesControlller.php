<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pick;
use Illuminate\Http\Request;

class birjonTesControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pick = Pick::orderBy('name', 'asc')->get();
        // dd($pick);
        return view('tes.adminJon', compact('pick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pic = new Pick();
        $catGory = Category::all();
        return view('tes.createJon', compact('pic', 'catGory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'no_tlp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);   
    
        $pick = Pick::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'address' => $data['address'],
            'no_tlp' => $data['no_tlp'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'category_id' => $data['category_id'],
            'image' => ''
        ]);

        if($request->hasfile('image')){
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $pick->image = $request->file('image')->getClientOriginalName();
            $pick->save();
        }

        // $pick->save();
        
        return redirect()->route('birjonAdmin.index')->with('success', 'Data created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pick = Pick::findOrFail($id);
        $categories = Category::all(); // Mengambil semua kategori untuk dropdown
        // dd($pick);
        return view('tes.editJon', compact('pick', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'no_tlp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $pick = Pick::findOrFail($id);
        $pick->name = $data['name'];
        $pick->description = $data['description'];
        $pick->address = $data['address'];
        $pick->no_tlp = $data['no_tlp'];
        $pick->latitude = $data['latitude'];
        $pick->longitude = $data['longitude'];
        $pick->category_id = $data['category_id'];
        $pick->image = $data['image'] ?? $pick->image; // Gunakan jika ada field image

        if ($request->hasFile('image')) {
            $existingImage = $pick->image;
            if ($existingImage && file_exists(public_path('images/' . $existingImage))) {
                unlink(public_path('images/' . $existingImage)); // Hapus gambar lama jika ada
            }
    
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $pick->image = $imageName;
        }
    
        $pick->save();
    

    
        return redirect()->route('birjonAdmin.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pick = Pick::findOrFail($id); // Cari data berdasarkan ID, jika tidak ditemukan, akan menghasilkan exception
            $pick->delete(); // Hapus data
    
            return redirect()->route('birjonAdmin.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('birjonAdmin.index')->with('error', 'Failed to delete data.');
        }
    }
}
