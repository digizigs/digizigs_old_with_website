<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TermsMeta;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('admin.posts.category');
    }

    public function getcategories(){
        //$categories=Category::with('sub_category')->get();//Category::orderby('created_at','desc')->get();
        $categories = Category::where('parent_id', '=', 0)->with('childs')->get();


        return request()->json(200,$categories);
    }

    public function cat(){
        //return 'Cat';
        $categories = Category::where('parent_id', '=', 0)->with('childs')->get();
        dd($categories);
    }
  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //return $request->all();

        $parent_id = $request->parent_id;
        $slug = $request->slug;

        $category = new Category;

        if($parent_id){
            $category->parent_id = $parent_id;
        }else{
            $category->parent_id = 0;
        }

        $category->name = $request->name;

        if($slug){
            $category->slug = $slug;
        }else{
            $category->slug = str_slug($category->name);
        }
        $category->description = $request->description;
        $cat_save = $category->save();

        if($cat_save){
            $category=Category::orderby('created_at','desc')->get();
            return request()->json(200,$category);
        }


        //return redirect()->back()->with('status','Category saved');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return $category = Category::find($id);
    }

   
    public function update(Request $request, $id){

        $parent_id = $request->parent_id;
        $slug = $request->slug;

        $category = Category::find($id);
        if($parent_id){$category->parent_id = $parent_id;}

        $category->name = $request->name;

        if($slug){
            $category->slug = $slug;
        }else{
            $category->slug = str_slug($category->name);
        }

        $category->description = $request->description;

        $cat_save = $category->save();
        if($cat_save){
            $category=Category::orderby('created_at','desc')->get();
            return request()->json(200,$category);
        }

    }

  
    public function destroy($id)
    {

        $category = Category::find($id);
        $is_deleted=$category->delete();
        if($is_deleted){
            $category=Category::orderby('created_at','desc')->get();
            return request()->json(200,$category);
        }
    }
}
