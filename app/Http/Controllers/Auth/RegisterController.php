<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\resendEmailVerification;
use App\Http\Controllers\Controller;
use App\Jobs\verifyEmail;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
   

    use RegistersUsers;

   
    protected $redirectTo = '/';

    
    public function __construct()
    {
        $this->middleware('guest');
    }

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

  
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'api_token' => Str::random(80),//hash('sha256', Str::random(80)),
            'verify_token' => Str::random(80),//hash('sha256', Str::random(80)),
        ]);

        $thisuser = User::findOrFail($user->id);
        $this->emailVerification($thisuser);
        return  $user;
    }

    public function emailVerification($thisuser){



    }

    public function resendEmailVerification(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->first();

        if($user){
            dispatch(new verifyEmail($user));
            return redirect('/login')->with('success', 'A fresh activation link send to your email');  
        }else{
            return redirect('/activationLink')->with('error', 'Oops we are unable to find this email, please check email');  
        }
        
    }

    /*Redirect to  email verification screen*/
    public function verifyEmail(){
        return view('auth.verify');
    }

    /* Send email verification link screen*/
    public function activationLink(){
         return view('auth.passwords.email');
    }




   /* public function registerSuccess(){
        return 'Registration Success';
    }*/
}
