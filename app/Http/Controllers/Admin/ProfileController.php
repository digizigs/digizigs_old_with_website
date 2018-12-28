<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProfileController extends Controller
{
    
    public function index() {

        //dd(config('app.url'));

        $userid = auth()->user();
        $user = Auth::getUser();



        //$userprofile =Profile::where('user_id',auth()->user()->id)->get();

        $avatars =Auth::getUser()->getMedia('avatar');

        return base_url();
        //$publicFullUrl = Auth::getUser()->getFullUrl();

        //return $avatars = Auth::getUser()->getMedia('avatars')->first()->getUrl('thumb');
        
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
