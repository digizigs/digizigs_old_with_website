<?php

namespace App\Http\Controllers\Dashboard\Facebook;

use App\Http\Controllers\Controller;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacebookPosterController extends Controller
{

	private $api;
	public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->auth_token);
            $this->api = $fb;
            return $next($request);
        });
    }


	public function index()
	{	
		$user = $this->api->get('/me/accounts');

		dd($user);
		$facebook = new Facebook;


		$api  = $facebook->api->post([

			'message' => 'Hello World'

		])->getGraphNode()->asArray();


		dd($facebook);
		return 'index';
	}


    public function retrieveUserProfile(){

    	$params = "first_name,last_name,age_range,gender";

        $user = $this->api->get('/me?fields='.$params)->getGraphUser();

        dd($user);
    }

    public function publishToProfile(){
	    try {
	        $response = $this->api->post('/me/feed', [
	            'message' => 'Hello World'//$request->message
	        ])->getGraphNode()->asArray();
	        if($response['id']){
	           return 'post created';
	        }
	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }
	}

	public function getPageAccessToken(){
		$params = "first_name,last_name,age_range,gender";
		$user = $this->api->get('/me?fields='.$params)->getGraphUser();
		$response = $this->api->get('/me/accounts', Auth::user()->auth_token);
		$pages = $response->getGraphEdge()->asArray();
		dd($pages);
	}
}
