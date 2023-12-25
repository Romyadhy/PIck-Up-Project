<?php

namespace App\Http\Controllers;

use App\Models\Picup;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $picups = Picup::paginate(4);
        // dd($picups);

        // $picups = $picup->paginate(5);

        return view('backpage.admin', compact('picups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $picups = new Picup();
        return view('backpage.create', compact('picups'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);   

            $picups =  Picup::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'address' => $data['address'],
                'no_tlp' => $data['no_tlp'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'image' => ''
            ]);

            
        if($request->hasfile('image')){
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $picups->image = $request->file('image')->getClientOriginalName();
            $picups->save();
        }
        
        return redirect()->route('admin.index')->with('success', 'Data created successfully.');

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
        $picups = Picup::findOrFail($id);
        // dd($picups);
        return view('backpage.edit', compact('picups'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $picups = Picup::findOrFail($id);
        $picups->fill($data);   
    
        // if ($request->hasFile('image')) {
        //     $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
        //     $picups->image = $request->file('image')->getClientOriginalName();
        // }

        if ($request->hasFile('image')) {
            $existingImage = $picups->image;
            if ($existingImage && file_exists(public_path('images/' . $existingImage))) {
                unlink(public_path('images/' . $existingImage)); // Hapus gambar lama jika ada
            }
    
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $picups->image = $imageName;
        }
    
        $picups->save();
    
        return redirect()->route('admin.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picups = Picup::findOrFail($id);
    
    // Hapus gambar terkait jika ada sebelum menghapus data Picup
    if ($picups->image && file_exists(public_path('images/' . $picups->image))) {
        unlink(public_path('images/' . $picups->image));
    }
    
    $picups->delete();

    return redirect()->route('admin.index')->with('success', 'Data deleted successfully.');
    }
}
