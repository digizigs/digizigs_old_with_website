<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public function attachments() {
        //return $this->belongsTo('App\Models\Tag');
        return $this->hasMany('App\Models\Attachment');
    }
}
