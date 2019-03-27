<?php
use App\Models\Post;
use App\Models\Category;
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
if(!function_exists('get_posts')){
	
	function get_posts(){
		
		
	    /*$posts = Post::where([['type','post'],['status','Published']])	    		
	    		->with('user')
	    		->with(['categories' => function($q) use ($cat) {$q->where('slug',$cat);}])
	    		->orderby('created_at','desc')
	    		->paginate(10);
	    return $posts;*/

	    $posts = Post::where([['type','post'],['status','Published']])
	    		->with('categories')
				->orderBy('created_at', 'DESC')
				->get();
	    return $posts;

	   
	}


}