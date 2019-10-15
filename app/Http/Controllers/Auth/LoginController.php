<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Session;
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

  
    protected $redirectTo = '/';

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }


    //Redirect to social provider
    public function redirectToServiceProvider($service)
    {
        //return $service;
         if($service == 'facebook'){

            //return Socialite::driver($service)->scopes([
            //"publish_actions, manage_pages", "publish_pages"])->redirect();

            return Socialite::driver($service)->scopes(["manage_pages", "publish_pages"])->redirect();


         }else{

            return Socialite::driver($service)->redirect();

         }
        
    }

    public function handleServiceProviderCallback(Request $request,$service)
    {
        
        if($service == 'google'){

            $user = Socialite::driver($service)->stateless()->user();

        }else{

            $user = Socialite::driver($service)->user();

        } 

        //dd($user);
        
        $findUser = User::updateOrCreate(
            ['email' => $user->getEmail()],
            ['name' => $user->name,'email' => $user->email,'auth_id'=> $user->id,'auth_type'=> $service,'auth_token'=> $user->token,'avatar_url'=> $user->avatar_original]
        );

        $userProfile = Profile::updateOrCreate(
            ['user_id' => $findUser->id],
            ['user_id' => $findUser->id,'avatar_url' => $user->avatar_original]
        );

        Auth::login($findUser, true);


        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath());
    }










}
