<?php

namespace App\Http\Controllers\Social;

use App\Classes\FacebookAPI;
use App\Http\Controllers\Controller;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacebookAPIController extends Controller
{
    
    public $fbapi;
    private $api;


	public function __construct(Facebook $fb){

		$this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->facebook->access_token);
            $this->api = $fb;
            return $next($request);
        });


	}

	public function index(){

		$pgs = $this->api->get('/me/accounts', Auth::user()->facebook->access_token)->getGraphEdge()->asArray();
		//$pages = $response->getGraphEdge()->asArray();
		$pages = [];


		foreach($pgs as $pg){
			$pages[] = array(
				'page_id' => $pg['id'],
				'page_name' => $pg['name'],
				'access_token' => $pg['access_token'],
				'category' => $pg['category'],
				'category_list' => $pg['category_list'],
				'page_photo' => $this->pagePhoto($pg['id'],$pg['access_token']),
				'cover_photo' => $this->coverPhoto($pg['id'],$pg['access_token']),
				'page_posts' => $this->pagePosts($pg['id'],$pg['access_token']),
				'page_likes' => $this->pageLikes($pg['id'],$pg['access_token']),

			);
		}

		//dd($pages);
		
		return view('dashboard.pages.social.facebook',compact('pages'));

	}

	public function show(Request $request)
    {


        return view('dashboard.pages.social.facebook_page_show');
    }

    public function retrieveUserProfile(){
        try {
 
            $params = "first_name,last_name,age_range,gender";
 
            $user = $this->api->get('/me?fields='.$params)->getGraphUser();
 
            dd($user);
 
        } catch (FacebookSDKException $e) {
 
        }
 
    }


    public function publishToProfile(Request $request){
	    try {
	        $response = $this->api->post('/me/feed', [
	            'message' => 'Wola wola ola'
	        ])->getGraphNode()->asArray();
	        if($response['id']){
	           // post created
	        }
	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }
	}


	public function getPageAccessToken($page_id){
	    try {
	         // Get the \Facebook\GraphNodes\GraphUser object for the current user.
	         // If you provided a 'default_access_token', the '{access-token}' is optional.
	         $response = $this->api->get('/me/accounts', Auth::user()->facebook->access_token);
	    } catch(FacebookResponseException $e) {
	        // When Graph returns an error
	        echo 'Graph returned an error: ' . $e->getMessage();
	        exit;
	    } catch(FacebookSDKException $e) {
	        // When validation fails or other local issues
	        echo 'Facebook SDK returned an error: ' . $e->getMessage();
	        exit;
	    }
	 
	    try {
	        $pages = $response->getGraphEdge()->asArray();
	        foreach ($pages as $key) {
	            if ($key['id'] == $page_id) {
	                return $key['access_token'];
	            }
	        }
	    } catch (FacebookSDKException $e) {
	        dd($e);
	    }
	}


	public function publishToPage(Request $request){

	    $page_id = '118375266236782';
	    $access_token = $this->getPageAccessToken($page_id);

	    try {
	        $post = $this->api->post('/' . $page_id . '/feed', array(
	        									'message' => 'test messagesssaasasa',
	        									'link'=>'http://www.cybernetikz.com/change-facebook-pages-cover-photo-using-graph-api-page-api/',
	        								),$access_token)->getGraphNode()->asArray();

	        //$post = $post->getGraphNode()->asArray();

	        dd($post);

	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }
	}

	public function pagePhoto($page_id,$access_token){
		//$page_id = '118375266236782';
		//$access_token = $this->getPageAccessToken($page_id);

		try {
			
			$response = $this->api->get('/'. $page_id . '?fields=photos{album,picture}',$access_token);
			$picture = $response->getGraphNode()->asArray();
			return $picture['photos'][0]['picture'];
			dd($picture['photos'][0]['picture']);

		} catch (FacebookSDKException $e) {
			
		}
	}


	public function coverPhoto($page_id,$access_token){
		//$page_id = '118375266236782';
		//$access_token = $this->getPageAccessToken($page_id);

		$response = $this->api->get('/'. $page_id . '?fields=cover',$access_token);

		try {

	        $cover_image = $response->getGraphNode()->asArray();
	        return $cover_image['cover']['source'];
	        
	    } catch (FacebookSDKException $e) {

	        dd($e); // handle exception

	    }

	}

	public function pagePosts($page_id,$access_token){

		$response = $this->api->get('/'. $page_id . '/feed',$access_token);

		try {

	       $page_feeds = $response->getGraphEdge()->asArray();
	       return $page_feeds;
	        
	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }

	}

	public function pageLikes($page_id,$access_token){

		$response = $this->api->get('/'. $page_id . '?fields=country_page_likes',$access_token);

		try {

	       $page_likes = $response->getGraphNode()->asArray();
	       return $page_likes['country_page_likes'];
	        
	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }

	}




}
