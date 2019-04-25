<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $guarded = ['id'];

	public function parent()
    {
        return $this->belongsTo($this,'id', 'parent_id');
    }

    public function child()
    {
        return $this->hasMany($this, 'parent_id','id');
    }

    public function subchild()
    {
       return $this->child()->with('subchild');
    }

    public static function tree() {

		return static::with(implode('.', array_fill(0, 100, 'child')))->where('parent_id', '=', '0')->get();

	}

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_category');
    }

}
