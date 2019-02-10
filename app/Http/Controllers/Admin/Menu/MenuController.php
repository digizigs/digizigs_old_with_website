<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

    	$menus = Menu::orderby('created_at','desc')->get();
    	//dd($menu);

    	return view('admin.pages.menu.menu',compact('menus'));
    }
}
