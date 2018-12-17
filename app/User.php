<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\verifyEmail;

class User extends Authenticatable
{
    use Notifiable,HasRoles;
  
   
    protected $fillable = [
        'firstname','lastname', 'email', 'password','verifyToken',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified(){
        return $this->verifyToken === null;
    }

     public function SendVerificationEmail(){

        $this->notify(new verifyEmail($this));
    }









    
}
