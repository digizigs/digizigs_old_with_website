<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    
    public function allPosts(){ 

        $posts = Post::orderby('created_at','desc')->where('type', 'post')->with('user','categories')->paginate(setting('post_per_page'));
        $popular_post = Post::orderby('views','desc')->where('type', 'post')->paginate(5);
        $categories = Category::orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();

        return view('app.pages.post',compact('posts','popular_post','categories','tags'));

    }

   
    public function detailPosts($slug){

        if (Session::get('slug') !== $slug) {
            Post::where('slug', $slug)->increment('views');
            Session::put('slug', $slug);
        }

        $post = Post::where('slug', $slug)->first();
        return view('app.pages.post_detail',compact('post'));
    }

    public function postByAuthor($author){


        $posts = Post::orderby('created_at','desc')->where('type', 'post')->with('user','categories')->paginate(setting('post_per_page'));
        $popular_post = Post::orderby('views','desc')->where('type', 'post')->paginate(5);
        $categories = Category::orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();

        return view('app.pages.post',compact('posts','popular_post','categories','tags'));
    }

    public function postByCategory($category){

        $posts = Post::orderby('created_at','desc')->where([['type','post'],['status','Published']])->with('user')
                        ->with('categories')         
                        ->whereHas('categories', function($query) use($category) {
                                $query->whereslug($category);
                            })
                        ->paginate(setting('post_per_page'));

        
        $popular_post = Post::orderby('views','desc')->where('type', 'post')->paginate(5);
        $categories = Category::orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();

        return view('app.pages.post',compact('posts','popular_post','categories','tags'));

    }
}
