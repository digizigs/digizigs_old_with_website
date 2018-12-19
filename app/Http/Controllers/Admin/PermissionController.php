<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index() {
        return view('admin.accesscontroll.permissions');
    }

    public function getpermission()
    {

        $permission = Permission::orderby('created_at','desc')->get();
        return request()->json(200,$permission);

    }
  
    public function create() {
        //
    }

   
    public function store(Request $request) {

        $permission_name= $request->permission_name;
        $permission = Permission::create(['name' => $permission_name]);

        $permissions = Permission::orderby('created_at','desc')->get();
        return request()->json(200,$permissions);
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
