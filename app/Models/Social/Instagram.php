<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    
    protected $fillable = [
        'user_id', 'app_id', 'token','avatar_url'
    ];


}
