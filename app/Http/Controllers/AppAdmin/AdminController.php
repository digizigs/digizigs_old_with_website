<?php

namespace App\Http\Controllers\AppAdmin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Option;
use App\Models\Setting;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Events\TaskEvent;

class AdminController extends Controller
{

    
    public function index(){
        event(new TaskEvent('Hello How are you bro'));
    	return view('admin.pages.dashboard');
    	//return view('admin.pages.adminminty');
        
    } 

    public function admin(){
        return view('appadmin.dashboard');
    }

    public function tables(){
    	return view('admin.asset.tables');
    }


    public function markAllNotificationRead() {
    	Auth::user()->notifications->markAsRead();
    	return Redirect::back()->with('message', 'All notification marked as read');
    }

    
}
