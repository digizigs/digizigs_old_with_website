<?php

namespace App\Http\Controllers\App;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    
    public function allPosts(){ 

        $posts = Post::orderby('created_at','desc')->where('type', 'post')->with('user','categories')->paginate(setting('post_per_page'));        
        return view('app.pages.post',compact('posts'));

    }

   
    public function detailPosts($slug){

        $post = Post::where('slug', $slug)->first();
        return view('app.pages.post_detail',compact('post'));
    }

    public function postByAuthor($author){

        $post = Post::where('slug', $slug)->first();
        return view('app.pages.post_detail',compact('post'));
    }
}
