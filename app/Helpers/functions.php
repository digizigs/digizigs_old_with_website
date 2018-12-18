<?php

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
