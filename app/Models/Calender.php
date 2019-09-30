<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $fillable = ['event','description','type','start','end','fullday'];
}
