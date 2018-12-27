<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Auth\Middleware\Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    
    public function index() {

        $userid = auth()->user();
        $userprofile =Profile::where('user_id',auth()->user()->id)->get();

        $avatars =auth()->user()->getMedia('avatar');

      

        //return $avatars = Auth::user()->getMedia('avatars')->first()->getUrl('thumb');
        
        return view('admin.profile.profile',compact('avatars'));
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
