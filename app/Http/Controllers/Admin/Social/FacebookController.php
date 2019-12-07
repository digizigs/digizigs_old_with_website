<?php

namespace App\Http\Controllers\Admin\Social;

use App\Http\Controllers\Controller;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\FacebookAPI;

class FacebookController extends Controller
{
    public $fbapi;
    private $api;

    public function __construct(Facebook $fb){
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->facebook->token);
            $this->api = $fb;
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.pages.social.facebook');
    }

    public function fbPages(){

        $pages = [];
        $pgs = $this->api->get('/me/accounts', Auth::user()->facebook->token)->getGraphEdge()->asArray();

        foreach($pgs as $pg){
            $pages[] = array(
                'page_id' => $pg['id'],
                'page_name' => $pg['name'],
                'access_token' => $pg['access_token'],
                'category' => $pg['category'],
                'category_list' => $pg['category_list'],
                //'page_photo' => $this->pagePhoto($pg['id'],$pg['access_token']),
                //'cover_photo' => $this->coverPhoto($pg['id'],$pg['access_token']),
                //'page_likes' => $this->pageLikes($pg['id'],$pg['access_token']),
                //'page_posts' => $this->pagePosts($pg['id'],$pg['access_token']),

            );
        }

        return $pages;

    }


    public function create()
    {
        
        $pages = $this->fbPages();

        return request()->json(200,$pages);

    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id ,Request $request)
    {   
        //return $request['access_token'];
        //return $this->pagePosts($request->page_id,$request->access_token);
        return $request->all();
        return $id;
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function pagePosts($page_id,$access_token){

        $response = $this->api->get('/'. $page_id . '/feed',$access_token);
        $post = [];

        try {

           $page_feeds = $response->getGraphEdge()->asArray();
           foreach($page_feeds as $feed){

                if (isset($feed['message'])) {
                     $post[] = array(
                        'id' => $feed['id'],
                        'message' => $feed['message'],
                        'image_url' => $this->pagePostsPhoto($feed['id'],$access_token),
                        'author' => '',
                        'created_on' => $feed['created_time'],
                    );   
                }
            }
           return $post;
            
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }

    }
}
