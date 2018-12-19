<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   
    public function index(){       
        $roles = Role::all();

        return view('admin.accesscontroll.roles', compact('roles'));
    }


    public function getroles()
    {
        $roles = Role::orderby('created_at','desc')->get();
        $permission = Permission::orderby('created_at','desc')->get();

        return request()->json(200,['roles'=>$roles,'permissions'=>$permission]);
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
