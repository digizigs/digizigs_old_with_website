<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    protected $table = 'views';

    public static function createViewLog($post) {
    	$postsViews= new Views();
    	$postsViews->titleslug = $post->slug;
    	$postsViews->url = \Request::url();
    	$postsViews->session_id = \Request::getSession()->getId();
    	$postsViews->ip = \Request::getClientIp();
    }
}
