<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\resendEmailVerification;
use App\Http\Controllers\Controller;
use App\Jobs\PasswordResetLinkJob;
use App\Jobs\verifyEmailJob;
use App\User;
use App\Models\Profile;
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
            'api_token' => hash('sha256', Str::random(60)),
            'verify_token' => hash('sha256', Str::random(60)),
        ]);

        $profile = new profile;
        $profile->user_id = $user->id;
        $profile->save();

        $thisuser = User::findOrFail($user->id);
        $this->emailVerification($thisuser);
        return  $user;
    }

    public function emailVerification($thisuser){

        dispatch(new verifyEmailJob($thisuser));
        return redirect('/login')->with('success', 'Account activation link send to ' . $thisuser->email . ' , Check tour email to activate yor account');

    }

    public function resendEmailVerification(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->first();
        $user->verify_token = Str::random(80);
        $user->save();

        if($user){
            dispatch(new verifyEmailJob($user));
            return redirect('/login')->with('success', 'Account activation link send to ' . $user['email'] . ' , Check tour email to activate yor account');
        }else{
            return redirect('/activationLink')->with('error', 'Oops we are unable to find this email, please check email');
        }

    }

    /*Account activation*/
    public function activateAccount($id,$verifytoken){

        $user = User::where(['id'=>$id,'verify_token'=>$verifytoken])->first();

        if($user){

                $user->status = '1';
                $user->verify_token = Null;
                $user->save();
                return redirect('/login')->with('verified', 'Your account is verified successfully, Login to continue');

        }else{
            return redirect('/login')->with('expired', 'Expired');
        }


    }

    /*Redirect to  email verification screen*/
    public function verifyEmail(){
        return view('auth.verify');
    }

    /* Send email verification link screen*/
    public function activationLink(){
         return view('auth.activation');
    }

    public function resetPassword(){
        return view('auth.resetlink');
    }

    public function resetPasswordLink(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->first();

        if($user){

            dispatch(new PasswordResetLinkJob($user));
            return redirect('/resetpassword')->with('success', 'Passwor reset link is sent to ' . $user->email . ' please check your email');

        }else{
            return redirect('/resetpassword')->with('error', 'Oops we are unable to find this email, please check email');
        }

    }

    public function reset(){

        return view('auth.reset');
    }


   /* public function registerSuccess(){
        return 'Registration Success';
    }*/
}
