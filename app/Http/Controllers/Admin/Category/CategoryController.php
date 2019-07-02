<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TermsMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function index() {   

        $categories = Category::with('child')->where('parent_id',0)->get();
        $cat = Category::with('child')->where('parent_id',0)->get();
        return view('admin.pages.category.category',compact('categories','cat'));
    }

  
    public function create() {
        
        $categories = Category::where('parent_id', 0)
                    ->with('child.posts')
                    ->orderby('created_at','desc')
                    ->get(); 
        return request()->json(200,$categories);
    }

   
    public function store(Request $request) {
        

        $data = Validator::make($request->all(),[
            'category_name'=>'required|max:50',   
        ],[
            'category_name.required' => 'Category name is required',
        ])->Validate();

        if($request->category_parent == ''){
            $parent_id = 0;
            
        }else{
            $parent_id = $request->category_parent;
        }
        

        $category = new Category;
        $category->parent_id = $parent_id;
        $category->name = $request->category_name;
        $category->slug = str_slug( $request->category_name );
        $cat_save = $category->save();

        
        if($cat_save){
            $categories = Category::where('parent_id', 0)
                    ->with('child.posts')
                    ->orderby('created_at','desc')
                    ->get(); 
            return request()->json(200,$categories);
        }

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id) {   

        $category = Category::find($id);
        return request()->json(200,$category);
        
    }

   
    public function update(Request $request, $id){

        
       
        if($request->category_parent == ''){
            $parent_id = 0;
            
        }else{
            $parent_id = $request->category_parent;
        }


        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->slug = str_slug( $request->category_name );
        $category->parent_id = $parent_id;
        $cat_save = $category->save();

        if($cat_save){           
            $categories = Category::where('parent_id', 0)
                    ->with('child.posts')
                    ->orderby('created_at','desc')
                    ->get(); 
            return request()->json(200,$categories);
        }

        

    }

  
    public function destroy($id) {

        $category = Category::find($id);
        $is_deleted=$category->delete();
        if($is_deleted){
            $categories = Category::where('parent_id', 0)
                    ->with('child.posts')
                    ->orderby('created_at','desc')
                    ->get(); 
            return request()->json(200,$categories);
        }
    }
}
