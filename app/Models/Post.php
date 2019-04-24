<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //




    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','post_category');
    }

}
