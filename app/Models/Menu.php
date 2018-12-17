<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{
    
    public function menu(){
    	return $this->belongsTo('App\Models\Menu', 'parent_id');
    }

    public function submenu(){
    	return $this->hasMany('App\Models\Menu', 'parent_id');
    }
}
