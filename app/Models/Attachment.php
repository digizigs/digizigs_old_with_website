<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function mails(){
        return $this->belongsToMany('App\Models\Mail');
    }
}
