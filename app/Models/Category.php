<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    public function childs() {
        return $this->hasMany(self::class,'parent_id','id') ;
    }

     public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_category');
    }

}
