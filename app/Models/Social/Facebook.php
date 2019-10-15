<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    
    protected $fillable = [
        'user_id', 'app_id', 'token','avatar_url'
    ];
    
}
