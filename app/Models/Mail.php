<?php

namespace App\Models;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
	
    public function attachments() {
        
        return $this->hasMany(Attachment::class);
    }
}
