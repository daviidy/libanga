<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.admin.index',['users' =>$users]);
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
        $users = User::join('address','address.user_id','users.id')
        ->where('users.id',auth()->user()->id)
        ->select('users.*','address.pays','address.city','address.description')
        ->first();

        return json_encode($users);
    }
    public function editByAdmin(Request $request)
    {
        $users = User::where('id',$request['user_id'])
        ->first();

        return json_encode($users);
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

            $id = auth()->user()->id;
            if(!is_file($request->image) || is_null($request->image))
            {
                $final_path = (auth()->user()->image) ? auth()->user()->image : null;
            }else{
                $filename=auth()->user()->username.'.'.$request->image->extension();

                $path=$request->image->move(storage_path('app/public/uploads/images/users'),$filename);
                $final_path = 'storage/uploads/images/users/'.$filename;
            }
            $users = User::where('id',$id);

            $users->update([
                'image'                  =>$final_path,
                'telephone'              =>$request->telephone,
                'user_description'       =>$request->user_description,
            ]);

            $address = Address::join('users','users.id','address.user_id')
                                ->where('users.id',$id)
                                ->select('users.*','address.id')
                                ->first();

                Address::updateOrCreate(
                            [
                                'user_id'=>$id
                            ],
                            [
                                'pays'                  =>$request->pays,
                                'city'                  =>$request->city,
                                'description'             =>$request->description,
                                'user_id'                  =>$id
                            ]);

            return redirect()->back()->with('status', 'Profil modifié avec succès');

        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur', 'Une erreur est survenue');
        }
    }
    public function updateByAdmin(Request $request, $id)
    {

        try {

            $users = User::where('id',$id)->first();
            if(!is_file($request->image) || is_null($request->image))
            {
                $final_path = ($users->image) ? $users->image : null;
            }else{
                $filename=$users->username.'.'.$request->image->extension();

                $path=$request->image->move(storage_path('app/public/uploads/images/users'),$filename);
                $final_path = 'storage/uploads/images/users/'.$filename;
            }
            $users->update([
                'image'                  =>$final_path,
                'type'                   =>$request->type
            ]);
            return redirect()->back()->with('status', 'Utilisateur modifié avec succès');


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
        try {

            User::where('id',$id)->delete();
            return redirect()->back()->with('status', 'Utilisateur supprimé de la base de données');

        } catch (\Throwable $th) {

            return redirect()->back()->with('erreur', 'Une erreur est survenue');
        }

    }

    public function uploadImage(Request $request){
        if(!is_file($request->image) || is_null($request->image)) return null;
        $filename=Str::slug($request->username);
        $filename=$filename.'.'.$request->image->extension();
        $path=$request->image->move(storage_path('app/public/assets/images/users/'),$filename);
        return 'storage/uploads/logos/png/'.$filename;
    }
}
