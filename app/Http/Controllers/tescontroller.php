<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pick;
use Illuminate\Http\Request;

class tescontroller extends Controller
{
    public function index(){
       // $tes = Category::distinct('name')->get(['name']);
        // dd($tes);
        // $tes = Pick::with('category')->get();
        $tes = Pick::with('category')->get()->pluck('category')->unique('name')->sortBy('id');

        return view('tes.landingtes', compact('tes'));
    }

    public function tesCoor(){
        $coordinate = Pick::select('latitude', 'longitude', 'name', 'address', 'image')->get();
        return response()->json($coordinate);
       }

    public function display(){
        $pic = Pick::with('category')->get();
        // dd($pic);
        return view('tes.displayPick', compact('pic'));
    }

    public function show($id)
    {
        // Temukan post berdasarkan ID
        $pick = Pick::findOrFail($id);
        $picups = Pick::where('id', $id)->get();

        // Jika post tidak ditemukan
        if (!$pick) {
            return abort(404);
        }
        // dd($pick);

        // Tampilkan view dengan data post
        return view('tes.detailSee', compact('pick'));
    }

    // public function getNow()
    // {
    //     // Lakukan pengecekan otentikasi
    //     if (auth()->check()) {
    //         $pick = Pick::all();
    //         // Jika terotentikasi, lakukan aksi yang diperlukan
    //         return view('tes.detailSee', compact('pick'));
    //     } else {
    //         // Jika tidak terotentikasi, redirect ke halaman login
    //         return redirect()->route('login');
    //     }
    // }
}
