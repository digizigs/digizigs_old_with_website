<?php

namespace App\Http\Controllers\Admin\WebBlock;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WebBlockController extends Controller
{
    
    public function index() {
        return view('admin.pages.webblock.webblock');
    }

    
    public function create() {

        $categories = Category::where('parent_id', 0)->with('child','posts.user','posts.categories','posts.tags')->orderby('created_at','desc')->get();
        return request()->json(200,$categories);
    }

   
    public function store(Request $request) {
        //
    }

    
    public function show($id) {
        //
    }

    
    public function edit($id) {
        //
    }

    
    public function update(Request $request, $id) {
        //
    }

    
    public function destroy($id) {

        $category = Category::find($id);
        $is_deleted=$category->delete();
        if($is_deleted){
            $categories = Category::where('parent_id', 0)->with('posts')->orderby('created_at','desc')->get();
            return request()->json(200,$categories);
        }
    }

    
}
