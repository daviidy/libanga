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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
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
            'albums.title',
            'albums.purchase_date',
            )
        ->where('type','artiste')
        ->where('users.id',auth()->user()->id)
        ->first();

        $services = Service::join('users','users.id','services.user_id')
        ->where('users.id',auth()->user()->id)
        ->select('services.*')
        ->get();
        if(auth()->user()->isArtiste())
        {
            return view('users.artistes.home',compact('services'));

        }elseif (auth()->user()->isAdmin()) {

            return view('users.admin.home');

        }else{

            return view('users.default.home',compact('artistes'));
        }
    }

    public function home()
    {
        $artistes = User::where('type','artiste')->limit(6)->get();
        return view('home',compact('artistes'));
    }

}
