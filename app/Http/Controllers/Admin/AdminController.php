<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Option;
use App\Models\Setting;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

  
  
    public function index(){
    	return view('admin.pages.dashboard');
    	//return view('admin.pages.adminminty');
    } 


    public function tables(){
    	return view('admin.asset.tables');
    }


    public function markAllNotificationRead() {
    	Auth::user()->notifications->markAsRead();
    	return Redirect::back()->with('message', 'All notification marked as read');
    }

    
}
