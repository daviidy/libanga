<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Service;
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
        // dd(auth()->user()->id);
        $artistes = User::join('address','address.user_id','users.id')
        ->join('albums','albums.user_id','users.id')
        ->select(
            'users.id',
            'users.username',
            'users.email',
            'users.user_description',
            'users.image',
            'users.type',
            'users.created_at',
            'address.city',
            'address.pays',
            'address.description as address_description',
            'albums.songs',
            'albums.purchase_date',
            )
        ->where('type','artiste')
        ->where('users.id',18)
        ->first();

        $nb_albums_count =Album::join('users','users.id','albums.user_id')
               ->where('users.id',18)
               ->count();

        $services = Service::join('users','users.id','services.user_id')
               ->where('users.id',18)
               ->get();
        // dd($artistes,auth()->user()->id);
        return view('users/artistes/home',compact('artistes','nb_albums_count','services'));
    }
    public function indexAdmin()
    {
        return view('users/admin/home');
    }

}
