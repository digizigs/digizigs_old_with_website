<?php


namespace App\Classes;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class FacebookAPI{

	private $fb;
    private $access_token;
    private $api;
 	

 	public function __construct(Facebook $fb)
    {
    	$this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->token);
            $this->api = $fb;
            return $next($request);
        });
    }

    
    public function getFacebookApi(){
    	return $this->fb;
    }

    public function checkForData(){



    	if(Auth::user()->facebook){
    		return 'Data Found';
           // Auth::user()->instagram()->update($details);
        }else{
        	$this->redirectToFacebookProvider();
        }

        return [];

    }

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->scopes(["manage_pages", "publish_pages"])->redirect();
    }


















}