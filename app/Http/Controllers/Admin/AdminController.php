<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Option;
use App\Models\User;
use App\Models\Setting;

use DB;

class AdminController extends Controller
{

  
  
    public function index(){
    	return view('admin.pages.dashboard');
    	//return view('admin.pages.adminminty');
    } 


    public function tables(){
    	return view('admin.asset.tables');
    }




    
}
