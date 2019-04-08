<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function service()
    {
        return $this->hasMany('App\Models\Service');
    }
}
