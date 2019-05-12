<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    
    public function index() {
      

        $user = User::findOrFail(auth()->user());

        //dd($user);
        $roles = auth()->user()->roles()->pluck('name');
    
        $userprofile =Profile::with('user')->where('user_id',auth()->user()->id)->first();

        //dd($userprofile);
       
        return view('admin.pages.profile.profile',compact('userprofile'));
    }

    
    public function create() {

        $user = User::find(auth()->user());
        $roles = auth()->user()->roles()->pluck('name');
    
        $userprofile =Profile::with('user')->where('user_id',auth()->user()->id)->first();

        $data = ['user'=>$user,'profile'=>$userprofile,'roles'=>$roles];
        return request()->json(200,$data);
    }

   
    public function store(Request $request) {
        $user = auth()->user();
        $user->addMedia($request->profilepic)->toMediaCollection('avatar');
        return redirect()->back()->with('message', 'Profile saved successfully');
    }

    
    public function show($id) {
        //
    }

    
    public function edit($id) {
        
        return $id;

    }

   
    public function update(Request $request, $id) {

        //For PAssword change
        if($request->oldpass){

            $get_user = Auth::user();
            $user = User::find($get_user->id);

            if (Hash::check($request->oldpass, $get_user->password)){
                $user->update([
                    'password' => Hash::make($request->input('newpass'))
                ]);
                return request()->json(200,'true');
            }else{
                return request()->json(200,'false');
            }
        }
        
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        $profile = Profile::where('user_id',$id)->firstOrFail();
        $profile->experience = $request->experience;
        $profile->skills = $request->skills;
        
        if($request->get('avatar')){
            $image = $id . '_' .time() . '.' . explode('/', explode(':', substr($request->get('avatar'), 0, strpos($request->get('avatar'), ';')))[1])[1];
            $location = public_path('uploads/avatars/' . $image);
            Image::make($request->get('avatar'))->save($location);            
            $profile->avatar_url = url('/public/uploads/avatars') . '/' . $image;         
        }

        $profile->save();

        $data = ['user'=>$user,'profile'=>$profile];

        return $data;
    }

   
    public function destroy($id) {
        //
    }
}
