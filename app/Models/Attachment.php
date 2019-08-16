<?php

namespace App\Models;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
   
   public function mail() {
        
        return $this->belongsTo(Mail::class);
    }

}
