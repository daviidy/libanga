<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Chanson;
use App\Models\Purchase;
use App\Models\Service;
use App\User;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    public function index()
    {
        $artistes = User::leftJoin('address','address.user_id','users.id')
        ->leftJoin('albums','albums.user_id','users.id')
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

        return view('users.artistes.home',compact('artistes','nb_albums_count','services'));
    }
    public function showAllArtiste()
    {
        $artistes = User::where('type','artiste')->get();
        return view('users.artistes.showAllArtiste',compact('artistes'));
    }


    public function show($id)
    {
        $artistes = User::leftJoin('address','address.user_id','users.id')
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
                             )
                         ->where('type','artiste')
                         ->where('users.id',$id)
                         ->first();

        $nb_albums_count =Album::join('users','users.id','albums.user_id')
                                ->where('users.id',$id)
                                ->count();

        $services = Service::join('users','users.id','services.user_id')
                                ->select('services.*')
                                ->where('users.id',$id)
                                ->get();
        $chansons = Chanson::join('albums','albums.id','chansons.album_id')
                            ->join('users','users.id','albums.user_id')
                            ->where('users.id',$id)
                            ->select('chansons.*','albums.title as album_title')
                            ->get();
        // dd($artistes,$id,$services);
        return view('users.artistes.show',compact('artistes','nb_albums_count','services','chansons'));
    }


    public function getArtiste($nb_pages)
    {
        $artistes = User::where('type','artiste')->offset($nb_pages*6)->limit(6)->get();
        return json_encode($artistes);
    }

    public function getCommande()
    {
        $id = auth()->user()->id;
        $purchases = Purchase::join('services','services.id','purchases.service_id')
        ->select('purchases.*','services.price','services.name')
        ->where('status','validé')
        ->get();
        return view('users.artistes.showCommande',compact('purchases'));

    }

}
