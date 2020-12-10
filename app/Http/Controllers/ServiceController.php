<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Validator;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admins.artiste.index', ['services' => $services]);
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
        $input=$request->all();
        $validator=Validator::make($input,[
            'name'=>'required|string',
            'type'=>'required|string',
            'price'=>'required|min:0',
            'service_description'=>'required|string',
            'user_id'=>'required|integer|exists:users,id'
        ],
        [
            'name.*' => "Le champ libellé du service est obligatoire",
            'type.*' => "Le champ type de service est obligatoire",
            'price.*' => "Le champ prix est obligatoire.",
            'service_description.*'         => "Le champ description du service est obligatoire"
        ]);

        // if($validator->fails()) return $this->sendError($this->arrayToChaine($validator->errors()->messages()), null);
        if($validator->fails()) return $this->sendError($validator->errors()->messages(), null);
        $services = Service::create($request->all());
        return $this->sendResponse($services->toArray(), "Services crée avec succès.");
        // return redirect('services')->with('status', 'Service ajoutée');
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
    public function edit(Service $services)
    {
        return view('admins.services.edit', ['serives' => $services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $services)
    {
        $services->update($request->all());
        return redirect('services')->with('status', 'Service modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $services)
    {
        $services->delete();
        return redirect()->back()->with('status', 'Service supprimé de la base de données');
    }
}
