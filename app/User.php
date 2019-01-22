<?php

namespace App;

use App\Models\Post;
use App\Models\Profile;
use App\Notifications\verifyEmail;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    
  
   
    protected $fillable = [
        'firstname','lastname', 'email', 'password','verifyToken',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    public function role()
    {
        return $this
        ->belongsToMany(Role::class, 'role_user')
        ->orderBy('created_at', 'DESC');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function verified(){
        return $this->verifyToken === null;
    }

    public function SendVerificationEmail(){

        $this->notify(new verifyEmail($this));
    }


    /*public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }*/
    





    
}
