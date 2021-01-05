<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('user_id',auth()->user()->id)->get();
        return view('users.artistes.home', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.artiste.create');
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

            $services = Service::create($request->all());
            return redirect()->back()->with('status', 'Service ajouté avec succès');

        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur', 'Une erreur est survenue veuillez bien remplir le formulaire');
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
        $services = Service::find($request['service_id']);
        return json_encode($services);
        // return view('admins.services.edit', ['services' => $services]);
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
        try {

            $services = Service::find($id);
            $services->update($request->all());
            return redirect('home')->with('status', 'Service modifiée');

        } catch (\Throwable $th) {

            return redirect('home')->with('erreur', 'Une erreur est survenue veuillez bien remplir le formulaire');
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

            Service::where('id',$id)->delete();
            return redirect()->back()->with('status', 'Service supprimé de la base de données');

        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur', 'Une erreur est survenue');
        }

    }
}
