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
}
