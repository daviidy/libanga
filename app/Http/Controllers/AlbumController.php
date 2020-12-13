<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Chanson;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('user_id',auth()->user()->id)
                        ->get();
        return view('users.albums.home', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $albums = Album::create($request->all());
        return redirect('albums')->with('status', 'Album ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chansons = Chanson::where('album_id',$id)
                             ->get();
        $albums = Album::join('users','users.id','albums.user_id')
                            ->where('albums.id',$id)
                            ->select('albums.*','users.username','users.image')
                            ->first();

        return view('users.albums.show',['chansons'=>$chansons,'albums'=>$albums]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $albums = Album::find($request['album_id']);
        return json_encode($albums);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $albums = Album::find($id);
        $albums->update($request->all());
        return redirect()->back()->with('status', 'Album modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::where('id',$id)->delete();
        return redirect()->back()->with('status', 'Album supprimé de la base de données');
    }
}
