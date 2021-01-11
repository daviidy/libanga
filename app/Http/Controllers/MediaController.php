<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Purchase;
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

        try
        {

            if(is_file($request->media) || !is_null($request->media))
            {

                $filename=$request->media;

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
            return redirect()->back()->with('status','Media ajouté avec succés');


        } catch (\Throwable $th) {

            return redirect()->back()->with('status','Media ajouté avec succés');
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
}
