<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{	

	protected $guarded = [];
    
    public static function findBySlug($slug){
    	//return 'Page Model';
    	return new Page([
    		'title'=> Str::title(str_replace('-','',$slug)),
    		'content'=> 'Some dummy text of teh page',
    		'slug' => $slug,
    	]);
    }
}
