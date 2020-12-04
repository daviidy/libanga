<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $artistes = User::where('type','artiste')->get();
        return view('users/default/home',compact('artistes'));
    }
    public function indexArtiste()
    {
        return view('users/artistes/home');
    }
    public function indexAdmin()
    {
        return view('users/admin/home');
    }

}
