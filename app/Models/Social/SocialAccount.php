<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
