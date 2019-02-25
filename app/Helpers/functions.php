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
if(!function_exists('get_post')){
	
	function get_post($args = null){

		$defaults = array(
	        'numberposts'      => 5,
	        'category'         => 0,
	        'orderby'          => 'date',
	        'order'            => 'DESC',
	        'include'          => array(),
	        'exclude'          => array(),
	        'meta_key'         => '',
	        'meta_value'       => '',
	        'post_type'        => 'post',
	        'suppress_filters' => true,
	    );

	    $posts = Post::where('type','post')->orderby('created_at','desc')->with('user','categories')->paginate(10);
	    //dd($posts);
	    //return 'posts';
	    return $posts;

	}

}