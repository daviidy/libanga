<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Chanson;
use Illuminate\Http\Request;

class ChansonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chansons = Chanson::get();
        // dd($chansons);
        $albums = Album::where('user_id',auth()->user()->id)->get();
        return view('users.chansons.home', ['chansons' => $chansons,'albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $chansons = Chanson::create($request->all());
            return redirect()->back()->with('status', 'Chanson ajoutée');

        } catch (\Throwable $th) {

            return redirect()->back()->with('ereur', 'Une erreur est survenue veuillez bien remplir le formulaire');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $chansons = Chanson::find($request['chanson_id']);
        return json_encode($chansons);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $chansons = Chanson::find($id);
            $chansons->update($request->all());
            return redirect()->back()->with('status', 'Chanson modifié avec succès');

        } catch (\Throwable $th) {

            return redirect()->back()->with('ereur', 'Une erreur est survenue veuillez bien remplir le formulaire');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Chanson::where('id',$id)->delete();
            return redirect()->back()->with('status', 'Chanson supprimé de la base de données');

        } catch (\Throwable $th) {

            return redirect()->back()->with('ereur', 'Une erreur est survenue');
        }

    }
}
