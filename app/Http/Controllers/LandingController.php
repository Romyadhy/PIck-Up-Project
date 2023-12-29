<?php

namespace App\Http\Controllers;

use App\Models\Picup;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $picups = Picup::all();
        // $picups = Picup::where('category', 'Truk')->get();
        // $category = 'Pickup Bak';
        // $picups = Picup::where('name', $category)->first();

    //     $uniqueNames = Picup::select('name')
    //     ->where('name', 'tes') // Ganti dengan kriteria pencarian yang sesuai
    //     ->distinct()
    //     ->get();

    // $pickups = [];
    // foreach ($uniqueNames as $name) {
    //     $picups = Picup::where('name', $name->name)->first();
    //     if ($picups) {
    //         $pickups[] = $picups;
    //     }
    // }

        return view ('frontpage.index', compact('picups'));
    }

    public function show($id)
    {
        $picup = Picup::findOrFail($id);
        $picups = Picup::where('id', $id)->get(); 

        // dd($picDes);
        return view('frontpage.detail', compact('picups', 'picup'));
    }

}
