<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class ArticleController extends Controller
{
    
    public function index() {

        return view('admin.pages.article.article');
    }

    
    public function create() {

        $categories = Category::where('parent_id','<>', 0 )->with('child')->orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();
        $blocks = Category::where('parent_id', 0)
                    ->with('child.posts','child.posts.user','child.posts.categories','child.posts.tags')
                    ->orderby('created_at','desc')
                    ->get();  
        return request()->json(200,['categories'=>$categories,'tags'=>$tags,'blocks'=>$blocks]);

    }

    
     
    public function store(Request $request) {

        $data = Validator::make($request->all(),[
         'title'=>'required|unique:posts,title|max:191',  
        ])->Validate();

       //return $post_status;

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->slug = str_slug($request->title);
        $post->status = $request->status;
        $post->type = 'post';

       //return str_slug($request->title);
       
        if($request->get('image')){
           $image = 'Post_id' . '_' .time() . '.' . explode('/', explode(':', substr($request->get('image'), 0, strpos($request->get('image'), ';')))[1])[1];
           $location = public_path('uploads/posts/' . $image);
           Image::make($request->get('image'))->save($location);
           $post->image_url  = url('/public/uploads/posts') . '/' . $image; 
        }

        $post->save();

           
        //Categoty Saving
        if(!$request->categories){          
           $post->categories()->sync([60]);
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

        $categories = Category::where('parent_id', 0)
                       ->with('child.posts','child.posts.user','child.posts.categories','child.posts.tags')
                       ->orderby('created_at','desc')
                       ->get();  
        return request()->json(200,$categories);

        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id) {

      $data = Validator::make($request->all(),[
         'title'=>'required|max:191',  
      ])->Validate();

      $post = Post::find($id);
      $post->user_id = Auth::user()->id;
      $post->title = $request->title;
      $post->description = $request->description;
      $post->body = $request->body;
      $post->slug = str_slug($request->title);
      $post->status = $request->status;
      $post->type = 'post';

      //Saving Image
      if($request->get('image')){
         $image = 'Post_id' . '_' .time() . '.' . explode('/', explode(':', substr($request->get('image'), 0, strpos($request->get('image'), ';')))[1])[1];
         $location = public_path('uploads/posts/' . $image);
         Image::make($request->get('image'))->save($location);
         $post->image_url  = url('/public/uploads/posts') . '/' . $image; 
      }

      $post->save();

      //Categoty Saving
      if(!$request->categories){          
         $post->categories()->sync([60]);
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

      $categories = Category::where('parent_id', 0)
                     ->with('child.posts','child.posts.user','child.posts.categories','child.posts.tags')
                     ->orderby('created_at','desc')
                     ->get();  
      return request()->json(200,$categories);
    }

    
    public function destroy($id) {
      
        $category = Category::find($id);
        $is_deleted=$category->delete();
        if($is_deleted){
            $categories = Category::where('parent_id', 0)
                        ->with('child.posts','child.posts.user','child.posts.categories','child.posts.tags')
                        ->orderby('created_at','desc')
                        ->get();  
            return request()->json(200,$categories);
        }
    }
}
