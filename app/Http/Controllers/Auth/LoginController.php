<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $findExistingUser = User::where('email',$user->getEmail())->first();
        if($findExistingUser){
            Auth::login($findExistingUser);
            return view('profiles.show',[
                'user'=>$findExistingUser,
            ]);
        }
        else{
            $googleUser = new User;
            $googleUser->username = $user->getName();
            $googleUser->email = $user->getEmail();
            $googleUser->avatar = $user->getAvatar();
            $googleUser->name = "Pi GU";
            $googleUser->password = bcrypt('12345678');
            $googleUser->save();
            Auth::login($googleUser);
            return redirect($googleUser->path());
        }


    }

}
