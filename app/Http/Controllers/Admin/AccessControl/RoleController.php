<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   
    public function index(){       
        $roles = Role::all();
        $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.accesscontroll.roles', compact('roles','permissions'));
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

   
    public function store(StoreRolesRequest $request)
    {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/

       
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);
        //$role_name= $request->role_name;
        //$role = Role::create(['name' => $role_name]);

        //$roles = Role::orderby('created_at','desc')->get();
        //return request()->json(200,$roles);
        return redirect()->route('role.index')->with('message', 'Role added successfully');
    }

  
  

    
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);


        return view('admin.accesscontroll.roleedit', compact('role', 'permissions'));
    }

  
    public function update(Request $request, $id)
    {
         if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('role.index')->with('message', 'Role updated successfully');
    }

   
    public function destroy($id)
    {
        

        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $role = Role::findOrFail($id);
        $role->delete();

         return redirect()->route('role.index')->with('deleted', 'Role deleted successfully');
        
    }
}
