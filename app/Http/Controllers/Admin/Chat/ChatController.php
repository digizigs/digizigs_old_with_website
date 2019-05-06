<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function index(){

    	return view('admin.pages.chat.chat');
    }

    public function chatUsers(){
    	$users = User::orderby('firstname','asc')->get();
    	return request()->json(200,$users);
    }
}
