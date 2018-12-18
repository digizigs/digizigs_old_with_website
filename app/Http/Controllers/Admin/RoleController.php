<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   
    public function index()
    {       
        return view('admin.accesscontroll.roles');
    }


    public function getroles()
    {
        $roles = Role::orderby('created_at','desc')->get();
        //$permission = Role::findByName($roles)->permissions;

        return request()->json(200,$roles);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        
        $role_name= $request->role_name;
        $role = Role::create(['name' => $role_name]);

        $roles = Role::orderby('created_at','desc')->get();
        return request()->json(200,$roles);
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        $role = Role::find($id);
        $is_deleted=$role->delete();
        if($is_deleted){
            $roles=Role::orderby('created_at','desc')->get();
            return request()->json(200,$roles);
        }
    }
}
