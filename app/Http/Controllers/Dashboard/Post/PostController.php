<?php

namespace App\Http\Controllers\Dashboard\Post;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderby('created_at','desc')->get();
        return view('dashboard.pages.post.posts',compact('posts'));
    }

    
    public function create()
    {
        return $this->data();

    }

    
    public function store(Request $request)
    {
        

        $data = Validator::make($request->all(),[
         'title'=>'required|unique:posts,title|max:191',  
        ])->Validate();

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->slug = str_slug($request->title);
        $post->status = $request->status;
        $post->type = 'post';

        if($request->get('image')){
           $image = 'Post_id' . '_' .time() . '.' . explode('/', explode(':', substr($request->get('image'), 0, strpos($request->get('image'), ';')))[1])[1];
           $location = public_path('uploads/posts/' . $image);
           Image::make($request->get('image'))->save($location);
           $post->image_url  = url('/public/uploads/posts') . '/' . $image; 
        }

        $post->save();

        //Categoty Saving
        if(!$request->categories){          
           $post->categories()->sync([$this->defaultCategory()]);
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
        
        return $this->data();

       
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

        $post = Post::find($id);
        $is_deleted=$post->delete();

        if($is_deleted){
            return $this->data();
        }
    }

    public function posttype($type)
    {
        return view('dashboard.pages.post.all');
    }

    public function data(){
        $blocks = Category::where('parent_id', 0)->get();
        $categories = Category::where('parent_id','<>', 0 )->orderby('created_at','desc')->get();

        $posts = Post::orderby('created_at','desc')->where('type', 'post')->where('status','published')->with('user','categories','tags')->paginate(5);
        
        return request()->json(200,['blocks'=>$blocks,'categories'=>$categories,'posts'=>$posts]);
    }

    public function defaultCategory(){
        $category = Category::where('slug','uncategorized')->first();
        return $category->id;
    }

}
