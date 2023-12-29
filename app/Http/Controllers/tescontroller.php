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
        $coordinate = Pick::select('latitude', 'longitude', 'name', 'address')->get();
        return response()->json($coordinate);
       }
}
