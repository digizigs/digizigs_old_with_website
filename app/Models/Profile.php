<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model{


	protected $fillable = ['user_id', 'avatar_url'];


    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    
}
