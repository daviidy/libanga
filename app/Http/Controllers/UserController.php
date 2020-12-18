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
        return view('users.admin.home',['users' =>$users]);
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
        ->select('users.*','address.pays','address.city')
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
                            ->where('users.id',$id);
        $address->update([
            'pays'                  =>$request->pays,
            'city'                  =>$request->city
        ]);

        return redirect()->back()->with('status', 'Profil modifié avec success');
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

    public function uploadImage(Request $request){
        if(!is_file($request->image) || is_null($request->image)) return null;
        $filename=Str::slug($request->username);
        $filename=$filename.'.'.$request->image->extension();
        $path=$request->image->move(storage_path('app/public//assets/images/users/'),$filename);
        return 'storage/uploads/logos/png/'.$filename;
    }
}
