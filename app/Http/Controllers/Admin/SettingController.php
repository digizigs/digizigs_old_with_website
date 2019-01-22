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

    	return view('admin.setting.setting');
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

}
