<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
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
        ->select('purchases.*','services.user_id as artiste','services.price','users.username')
        ->where('status','validé')
        ->where('purchase_state','en cours')
        ->get();
        $users = User::all();
        return view('users.admin.commandes',compact('purchases','users'));
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
    public function edit(Request $request)
    {
        $purchases = Purchase::find($request['purchase_id']);
        return json_encode($purchases);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $commande = Purchase::where('id',$request->purchase_id)->first();
            $commande->update(['purchase_state'=>$request->purchase_state]);
            $this->commentNotificationToArtist($request);
            return redirect()->back()->with('status', 'Commande modifié avec succès');

        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur', 'Une erreur est survenue');
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
        //
    }

    public function commentNotificationToArtist($request)
    {
        $mailController = new MailController();
        $purchase = Purchase::where('id',$request->purchase_id)
        ->with('users')
        ->with(['serives'=>function($service){
            $service->with('users');
        }])->first();

        try{

            $date = Carbon::parse($purchase->created_at)->format('d/m/Y');
            $detailCommandeClient = ['service'=>$purchase->serives->name,'artiste'=>$purchase->serives->users->username,
            'email'=>$purchase->serives->users->email,'client'=>$purchase->users->username,
             'price'=>$purchase->serives->price,'date'=>$date];
            $mailController->appreciation($detailCommandeClient);
        }catch(\Exception $ex){
            return redirect()->back()->with('erreur', 'Une erreur est survenue');
        }  
    }
}
