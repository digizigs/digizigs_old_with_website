<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   
    public function index()
    {
        return view('admin\posts\all_post');
    }

   
    public function create()
    {
        return view('admin\posts\new_post');
    }

    public function publishpost(Request $request)
    {
        return $request->all();
        //return 'Publish';
    }
   
    public function store(Request $request){
       
        $data = Validator::make($request->all(),[
            'title'=>'required|max:255',
            'desc'=>'required|max:255',
            'body'=>'required',          
        ],[
            'title.required' => 'Post Title is required',
            'desc.required' => 'Post Description is required',
            'body.required' => 'Post Content is required', 
        ])->Validate();

        $post = new Post;
        $post->author_id = 1;
        $post->title = $request->title;
        $post->description = $request->desc;
        $post->body = $request->body;
        $post->body = $request->body;
        $post->body = $request->body;
        $post->slug = str_slug( $request->title );

        $save_post = $post->save();

        //if($save_post){
            //return redirect()->back()->with('status','Category saved');
        //}

        return $request->desc;

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
}
