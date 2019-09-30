<?php

namespace App\Http\Controllers\Dashboard\Post;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderby('created_at','desc')->get();
        return view('dashboard.pages.post.posts',compact('posts'));
    }

    
    public function create()
    {
        $blocks = Category::where('parent_id', 0)->get();
        $categories = Category::where('parent_id','<>', 0 )->orderby('created_at','desc')->get();
        $posts = Post::orderby('created_at','desc')->with('user','categories','tags')->get();
        return request()->json(200,['blocks'=>$blocks,'categories'=>$categories,'posts'=>$posts]);


    }

    
    public function store(Request $request)
    {
        dd($request->all());
    }

    
    public function show($id)
    {
        //
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

    public function posttype($type)
    {
        return view('dashboard.pages.post.all');
    }

}
