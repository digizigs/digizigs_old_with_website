<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    /*public function invoice_item()
    {
        return $this->hasMany('App\Models\Invoice_item');
    }*/

    public function invoice_item()
    {
        return $this->hasMany('App\Models\Invoice_item');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service','invoice_service');
    }
}
