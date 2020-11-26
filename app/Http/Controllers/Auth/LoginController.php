<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                 return redirect('/home');
            } else {
                $newUser = User::create(['username' => $user->name, 'email' => $user->email, 'facebook_id' => $user->id]);
                Auth::login($newUser);
                return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
