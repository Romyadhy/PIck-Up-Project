<?php

namespace App\Http\Controllers;

use App\Models\Picup;
use Illuminate\Http\Request;

class CoorController extends Controller
{
    public function getCoor(){
        $coordinate = Picup::select('latitude', 'longitude')->get();
        return response()->json($coordinate);
       }
}
