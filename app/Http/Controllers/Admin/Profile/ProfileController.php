<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProfileController extends Controller
{
    
    public function index() {
      

        $user = User::find(auth()->user());
        
        $userprofile =Profile::with('user')->where('user_id',auth()->user()->id)->first();

        //dd($userprofile);
       
        return view('admin.pages.profile.profile',compact('userprofile'));
    }

    
    public function create() {
        //
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
        //
    }

   
    public function update(Request $request, $id) {
        //
    }

   
    public function destroy($id) {
        //
    }
}
