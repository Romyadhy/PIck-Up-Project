<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pick;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pick = Pick::orderBy('name', 'asc')->paginate(5);
        $category = Category::paginate(4);
        // dd($pick);
        // dd($category);

        return view('tes.category.admin', compact( 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categ = new Category();
        return view('tes.category.createCat', compact('categ'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'price_per_km' => 'required|numeric',
            ]);
    
            Category::create([
                'name' => $data['name'],
                'price_per_km' => $data['price_per_km'],
            ]);
    
            return redirect()->route('birjonAdminCategory.index')->with('success', 'Category created successfully.');
        } catch (QueryException $e) {
            // Tangkap kesalahan query, bisa di-log atau berikan pesan yang sesuai.
            return redirect()->route('birjonAdminCategory.create')->with('error', 'Failed to create category. Please try again.');
        }
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
        $pick = Category::findOrFail($id);
        // $categories = Category::all(); // Mengambil semua kategori untuk dropdown
        // dd($pick);
        return view('tes.category.editCat', compact('pick'));
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
        try {
            $category = Category::findOrFail($id);

            $data = $request->validate([
                'name' => 'required',
                'price_per_km' => 'required|numeric',
            ]);

            $category->update([
                'name' => $data['name'],
                'price_per_km' => $data['price_per_km'],
            ]);

            return redirect()->route('birjonAdminCategory.index')->with('success', 'Category updated successfully.');
        } catch (QueryException $e) {
            // Tangkap kesalahan query, bisa di-log atau berikan pesan yang sesuai.
            return redirect()->route('birjonAdminCategory.edit', $id)->with('error', 'Failed to update category. Please try again.');
        }
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
            $pick = Category::findOrFail($id); // Cari data berdasarkan ID, jika tidak ditemukan, akan menghasilkan exception
            $pick->delete(); // Hapus data
    
            return redirect()->route('birjonAdminCategory.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('birjonAdminCategory.index')->with('error', 'Failed to delete data.');
        }
    }
}
