<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\User;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $purchases = Purchase::join('services','services.id','purchases.service_id')
        ->join('users','users.id','purchases.user_id')
        ->leftJoin('medias','medias.purchase_id','purchases.id')
        ->select('services.*','users.username','purchases.status','purchases.purchase_state','purchases.id as purchase_id','medias.id as media_id','purchases.created_at as purchase_creation')
        ->where('users.id',auth()->user()->id)
        ->where('purchases.status','validé')
        ->get();
        $users = User::where('type','artiste')->get();

        // dd($purchases);
        return view('users.default.commandes.index',compact('purchases','users'));
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
        //
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
    public function edit()
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
