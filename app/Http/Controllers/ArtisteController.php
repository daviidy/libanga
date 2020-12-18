<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Service;
use App\User;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
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

        // $nb_albums_count =Album::join('users','users.id','albums.user_id')
        //        ->where('users.id',auth()->user()->id)
        //        ->count();

        // $services = Service::join('users','users.id','services.user_id')
        //        ->where('users.id',auth()->user()->id)
        //        ->get();
        // dd($artistes,auth()->user()->id);
        return view('users.artistes.home',compact('artistes','nb_albums_count','services'));
    }
    public function showAllArtiste()
    {
        $artistes = User::join('address','address.user_id','users.id')
        // ->leftJoin('albums','albums.user_id','users.id')
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
            // 'albums.title',
            // 'albums.purchase_date',
            )
        ->where('type','artiste')
        ->get();

        return view('users.artistes.showAllArtiste',compact('artistes'));
    }


    public function show($id)
    {
        $artistes = User::join('address','address.user_id','users.id')
                        //  ->join('albums','albums.user_id','users.id')
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
                            //  'albums.title',
                            //  'albums.purchase_date',
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
        // dd($artistes,$id,$services);
        return view('users.artistes.show',compact('artistes','nb_albums_count','services'));
    }


    public function getArtiste($nb_pages)
    {
        $artistes = User::where('type','artiste')->offset($nb_pages*6)->limit(6)->get();
        return json_encode($artistes);
    }
}
