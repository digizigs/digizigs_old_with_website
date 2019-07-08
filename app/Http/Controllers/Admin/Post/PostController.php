<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
   
    public function index(Request $request)
    {

      return 'post';

        //$posts = Post::paginate(10);
        //$posts = with('author')->find(1);

        if($request->has('posts_type')){

            $post_type = $request->posts_type;


            if($post_type === 'published'){

                $posts = Post::where([['type','post'],['status','=','published']])->orderby('created_at','desc')->with('user','categories')->paginate(7);
                return view('admin.pages.post.posts',compact('posts'));

            }elseif($post_type === 'draft'){

                $posts = Post::where([['type','post'],['status','=','draft']])->orderby('created_at','desc')->with('user','categories')->paginate(7);
                return view('admin.pages.post.posts',compact('posts'));

            }elseif(($post_type === 'trashed')){

                $posts = Post::where([['type','post'],['status','=','trashed']])->orderby('created_at','desc')->with('user','categories')->paginate(7);
                return view('admin.pages.post.posts',compact('posts'));

            }
            
            
        }else{
            $posts = Post::where([['type','post'],['status','!=','trashed']])->orderby('created_at','desc')->with('user','categories')->paginate(7);
            return view('admin.pages.post.posts',compact('posts')); 
        }

        
      
    }

    public function getallpost(){

        $posts = Post::where('type','post')->orderby('created_at','desc')->with('user','categories')->get();
        return request()->json(200,$posts);
    }
   
    public function create()
    {
        $categories = Category::orderby('created_at','desc')->get();
        return view('admin.pages.post.post_new',compact('categories'));
    }

    public function publishpost(Request $request)
    {
        return $request->all();
        //return 'Publish';
    }
   
    public function store(Request $request){
        //dd($request->all());
        //return  $request->all();
     
        $data = Validator::make($request->all(),[
            'post_title'=>'required|max:191',     
        ],[
            'post_title.required' => 'Post Title is required', 
        ])->Validate();

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->post_title;
        $post->description = $request->post_desc;
        $post->body = $request->post_body;
        $post->slug = str_slug( $request->post_title );
        $post->status = $request->status;
        $post->type = 'post';

        if($request->hasFile('feature_image')){
            $image = $request->file('feature_image');
            $filename = time().'_'. $image->getClientOriginalName();
            $location = public_path('uploads/posts/' . $filename);
            //Image::make($image->getRealPath())->resize(250, 250)->save($location);
            Image::make($image->getRealPath())->save($location);            
            $post->image_url = url('/public/uploads/posts') . '/' . $filename;           
        }
        
        $post->save();

        //Sync categories
        if(!$request->categories){          
            $post->categories()->sync([1]);
        }else{
            $post->categories()->sync($request->categories);
        }
        
        //Saving Tags
        $tagIds = [];
        if($request->tags){

            $tags = $request->tags;
            foreach($tags as $tag){

                $ntag = Tag::firstOrCreate(['name'=>$tag,'slug'=>str_slug( $tag)]);
                if($tag)
                {
                  $tagIds[] = $ntag->id;
                }


            }
        }

        //dd($tagIds);
        $post->tags()->sync($tagIds);

        //if($save_post){
            //return redirect()->back()->with('status','Category saved');
        //}


        return redirect()->route('post.index')->with('message', 'New Post added successfully');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {   

        if (! Gate::allows('edit_post')) {
            return abort(401);
        }
        
        $post = Post::with('categories','tags')->find($id);
        $categories = Category::orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();
        return view('admin.pages.post.post_edit',compact('categories','post','tags'));
    }

   
    public function update(Request $request, $id){ 

        //return $request->all();

        $data = Validator::make($request->all(),[
            'post_title'=>'required|max:255',     
        ],[
            'post_title.required' => 'Post Title is required', 
        ])->Validate();

        $post = Post::find($id);
        $post->title = $request->post_title;
        $post->description = $request->post_desc;
        $post->body = $request->post_body;
        $post->slug = str_slug( $request->post_title );
        $post->status = $request->status;

        if($request->hasFile('feature_image')){
            $image = $request->file('feature_image');
            $filename = time().'_'. $image->getClientOriginalName();
            $location = public_path('uploads/' . $filename);
            //Image::make($image->getRealPath())->resize(250, 250)->save($location);
            Image::make($image->getRealPath())->save($location);      
            $post->image_url = url('/public/uploads') . '/' . $filename;       
        }

        $post->save();
        //$post->categories()->sync($request->categories);
        //Sync categories
        if(!$request->categories){           
            $post->categories()->sync([0]);
        }else{
            $post->categories()->sync($request->categories);
        }
        
     
        //Saving Tags
        $tagIds = [];
        if($request->tags){
            $tags = $request->tags;
            foreach($tags as $tag){

                /*$itag = Tag::where('name', '=', $tag)->first();


                if ($itag != null) {
                    $tagIds[] = $itag->id;
                }else{
                    $ntag = new Tag;
                    $ntag->post_id = $post->id;
                    $ntag->name = $tag;
                    $ntag->slug = str_slug( $tag);
                    $ntag->save();
                    $tagIds[] = $ntag->id;
                }*/

                $ntag = Tag::firstOrCreate(['name'=>$tag,'slug'=>str_slug( $tag)]);
                if($tag)
                {
                  $tagIds[] = $ntag->id;
                }

            }
        }
        
        $post->tags()->sync($tagIds);

        return redirect()->route('post.index')->with('success', 'Post Updated successfully');
    }    
   
    public function destroy($id)
    {
        $post = Post::find($id);
        $is_deleted=$post->delete();
        if($is_deleted){
            return redirect()->route('post.index')->with('deleted', 'Post deleted successfully');
        }
    }


}
