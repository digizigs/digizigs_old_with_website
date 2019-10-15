<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class FacebookOAuthController extends Controller
{

	protected function guard()
    {
        return Auth::guard();
    }
    
    public function redirectToServiceProvider(){

    	return Socialite::driver('facebook')->scopes(["manage_pages", "publish_pages"])->redirect();
    }


    public function handleServiceProviderCallback(Request $request){

    	$fb = Socialite::driver('facebook')->user();

    	$user_id = Auth::user()->id;

    	

    	$details = [
    		"user_id" => $user_id,
    		"app_id" => $fb->id,
            "access_token" => $fb->token,
            "avatar_url" => $fb->avatar_original,	
        ];

    	if(Auth::user()->facebook){
            Auth::user()->facebook()->update($details);
        }else{
            Auth::user()->facebook()->create($details);
        }

        return redirect('/');

    }

    

}
	