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

        return view('admin.pages.access.roles', compact('roles','permissions'));
    }


    public function getroles()
    {
        $roles = Role::orderby('created_at','desc')->get();
        $permission = Permission::orderby('created_at','desc')->get();

        return request()->json(200,['roles'=>$roles,'permissions'=>$permission]);
    }

   
    public function create(Request $request) {

        $permissions = Permission::orderby('created_at','desc')->get()->toArray();

        if($request->search_string == ''){
            $roles = Role::orderby('created_at','desc')->with('permissions')->paginate(8);        
            return request()->json(200,['roles'=>$roles,'permissions'=>$permissions]);
        }else{
            $roles['data'] = Role::where('name','like', '%'.$request->search_string.'%')                             
                                ->orderby('created_at','desc')
                                ->with('permissions')
                                ->get();
            return request()->json(200,['roles'=>$roles,'permissions'=>$permissions]);
        }
    }

   
    public function store(Request $request) {

        /*if (! Gate::allows('manage_role')) {
            return abort(401);
        }*/

        //return $request->permissions;


        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->givePermissionTo($request->permissions);

        //$role = Role::create($request->except('permission'));
        //$permissions = $request->input('permission') ? $request->input('permission') : [];
        //$role->givePermissionTo($permissions);
        //$role_name= $request->role_name;
        //$role = Role::create(['name' => $role_name]);

        //$roles = Role::orderby('created_at','desc')->get();
        //return request()->json(200,$roles);




        $permissions = Permission::orderby('created_at','desc')->get()->toArray();
        $roles = Role::orderby('created_at','desc')->with('permissions')->paginate(8);
        return request()->json(200,['roles'=>$roles,'permissions'=>$permissions]);
    }

  
  

    
    public function edit($id) {
        if (! Gate::allows('manage_role')) {
            return abort(401);
        }

        $permissions = Permission::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);


        return view('admin.pages.access.role_edit', compact('role', 'permissions'));
    }

  
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_role')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('message', 'Role updated successfully');
    }

   
    public function destroy($id)
    {
        

        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $role = Role::find($id);
        $is_deleted=$role->delete();
        if($is_deleted){
            $permissions = Permission::orderby('created_at','desc')->get()->toArray();
            $roles = Role::orderby('created_at','desc')->with('permissions')->paginate(8);
            return request()->json(200,['roles'=>$roles,'permissions'=>$permissions]);
        }
        
    }
}
