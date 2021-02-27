<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Purchase;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $datas = $request->all();
        try
        {
            $filename=$request->media;
            if(is_file($request->media) || !is_null($request->media))
            {

                if($filename->getClientOriginalExtension() != 'mp3')
                {
                    return redirect()->back()->with('erreur',"Le fichier doit être obligatoirement de type mp3");
                }

                $filename=auth()->user()->username.'_'.$filename->getClientOriginalName();
                $path=$request->media->move(storage_path('app/public/uploads/medias/'),$filename);
                $final_path = 'storage/uploads/medias/'.$filename;
            }else{
                $final_path = null;
            }

            $medias = Media::create([
                'media' =>$final_path,
                'name' =>$filename,
                'purchase_id' =>$request->purchase_id
            ]);
            // $purchase = Purchase::where('id',$request->purchase_id)->first();
            // $purchase->update([
            //     "medias_id" => $medias->id
            // ]);
            $this->extraitNotificationToClient($datas);
            return redirect()->back()->with('status','Media ajouté avec succés');


        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur',"Une erreur est survenue veuillez bien remplir le formulaire");
        }


    }

    public function uploadMedia(Request $request){
        if(!is_file($request->media) || is_null($request->media)) return null;
        $filename=Str::slug(auth()->user()->username);
        $filename=auth()->user()->id.auth()->user()->email.'_'.$filename.'.'.$request->image->extension();
        $path=$request->image->move(storage_path('app/public/upload/medias/'),$filename);
        return 'storage/uploads/medias/'.$filename;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $medias = Media::find($request['media_id']);
        return json_encode($medias);
    }

    public function downloadMedia($path)
    {
        $get_path = storage_path($path);

        return response()->download($get_path);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

            Media::where('id',$id)->delete();
            return redirect()->back()->with('status', 'Media supprimé de la base de données');

        } catch (\Throwable $th) {

            return redirect()->back()->with('ereur', 'Une erreur est survenue');
        }


    }
    public function extraitNotificationToClient($datas)
    {
        $mailController = new MailController();
        try{
            $service = Service::where('id', $datas['service_id'])->with('users')->first();
            $purchase = Purchase::where('id', $datas['purchase_id'])->with('users')->first();
            $date = Carbon::parse($purchase->created_at)->format('d/m/Y');
            $detailCommandeClient = ['service'=>$service->name,'artiste'=>$service->users->username,
            'email'=>$purchase->users->email,'client'=>$purchase->users->username,
             'price'=>$service->price,'date'=>$date];
            $mailController->extraitNotification($detailCommandeClient);
        }catch(\Exception $ex){
            return redirect()->back()->with('erreur',"Une erreur est survenue veuillez bien remplir le formulaire");
        }  
    }
}
