<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialFacebookAccountService;
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
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {

        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                 return redirect('/home');
            } else {
                $newUser = User::create(['username' => $user->name, 'password' => $user->id.date("Ymd"), 'email' => $user->email, 'provider_id' => $user->id, 'provider' => $user->id,'image' =>"/assets/images/users/avatar_default.png","type"=>"default"]);
                Auth::login($newUser);
                return redirect('/home');
                // return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('/redirect');
        }
    }

}
