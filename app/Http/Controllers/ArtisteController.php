<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\User;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    public function home()
    {
        $artistes = User::where('type','artiste')->with('albums')->limit(6)->get();
        return view('home',compact('artistes'));
    }

    public function showArtiste($id)
    {
        $artistes = User::where('type','artiste')->with('albums')->get();
        return view('artiste',compact('artistes'));
    }

    public function getArtiste($nb_pages)
    {
        $artistes = User::where('type','artiste')->with('albums')->offset($nb_pages*6)->limit(6)->get();
        return json_encode($artistes);
    }
}
