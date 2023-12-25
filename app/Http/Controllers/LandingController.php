<?php

namespace App\Http\Controllers;

use App\Models\Picup;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $picups = Picup::all();
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
