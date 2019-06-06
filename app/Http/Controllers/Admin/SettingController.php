<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
	{
		$setting = setting('admin_url');

    	return view('admin.pages.setting.setting');
	}


	public function store(Request $request)
	{
	    $rules = Setting::getValidationRules();
	    $data = $this->validate($request, $rules);

	    $validSettings = array_keys($rules);

	    foreach ($data as $key => $val) {
	        if (in_array($key, $validSettings)) {
	            Setting::add($key, $val, Setting::getDataType($key));
	        }
	    }

	    return redirect()->back()->with('message', 'Settings has been saved.');
	}


	public function set_general_setting(Request $request){

		

		$data = array('app_name'=>$request->app_name,
                      'app_desc'=>$request->app_desc,
                      'app_url'=>$request->app_url,
                      'app_email'=>$request->app_email,
    	);




		

    	

	}




}
