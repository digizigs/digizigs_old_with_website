<?php
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

function hello($name){
	return 'say hello '.$name;
}



//helper function for active menu
if(!function_exists('active_menu')){
	function active_menu($currentRouteName, $requestName, $start, $finish){
		if(substr($currentRouteName, $start, $finish) == $requestName){
			return 'active';
		}{
			return null;
		}
	}
}


//get post

if(!function_exists('get_posts_by_cat')){
	function get_posts_by_cat($category_slug){
		
		$category = Category::where('slug', $category_slug)->firstOrFail();
		//dd($category);
		if($category){
			$posts = $category->posts;
			return $posts;
		}
		
	}
}


if(!function_exists('get_posts')){
	
	function get_posts($category,$count){
	
		if($category == 'all'){
			$posts = Post::where([['type','post'],['status','Published']])->paginate($count);
			return $posts;
		}else{
			$posts = Post::where([['type','post'],['status','Published']])->with('user')
	    				->with('categories')         
            			->whereHas('categories', function($query) use($category) {
                				$query->whereslug($category);
            				})
            			->paginate($count);
	    	return $posts;
		}
			   
	}

	/*@foreach($posts = get_posts('code',100) as $post)
            <h4>{{$post->title}}</h4>
            
            Posted By:{{$post->user->firstname}}

            <p>Categories</p>
            @foreach($post->categories as $cat)
                {{$cat->name}}
            @endforeach
            <br><br>
    @endforeach*/

}