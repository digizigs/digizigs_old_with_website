<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    
    protected $fillable = [
        'user_id', 'app_id', 'token','avatar_url'
    ];
    
}
