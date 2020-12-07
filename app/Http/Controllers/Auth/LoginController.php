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

    public function redirectTo(){

        // User role
        $type_user = Auth::user()->type;

        // Check user role
        switch ($type_user) {
            case 'admin':
                  return '/admin';
                break;
            case 'artiste':
                    return '/artiste';
                break;
            default:
                return '/home';
                break;
        }
    }
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
        // $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        // auth()->login($user);
        // return redirect()->to('/home');
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                 return redirect('/home');
            } else {
                $newUser = User::create(['username' => $user->name, 'email' => $user->email, 'provider_id' => $user->id, 'provider' => $user->id]);
                Auth::login($newUser);
                return redirect('/home');
                // return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('/redirect');
        }
    }
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                 return redirect('/home');
            } else {
                $newUser = User::create(['username' => $user->name, 'email' => $user->email, 'provider_id' => $user->id, 'provider' => 'facebook']);
                Auth::login($newUser);
                return redirect('/home');
                // return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('auth/facebook');
        }
    }

    // public function redirect($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }
    // public function callback($provider)
    // {
    //   $getInfo = Socialite::driver($provider)->user();
    //   $user = $this->createUser($getInfo,$provider);
    //   auth()->login($user);
    //   return redirect()->to('/home');
    // }
    // function createUser($getInfo,$provider){
    // $user = User::where('provider_id', $getInfo->id)->first();
    // if (!$user) {
    //      $user = User::create([
    //         'username'     => $getInfo->name,
    //         'name'     => $getInfo->name,
    //         'email'    => $getInfo->email,
    //         'provider' => $provider,
    //         'provider_id' => $getInfo->id
    //     ]);
    //   }
    //   return $user;
    // }
}
