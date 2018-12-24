<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index() {

        $permissions = Permission::paginate(5);  
        return view('admin.accesscontroll.permissions', compact('permissions'));
    }

    public function create() {
        //
    }

   
    public function store(StorePermissionRequest $request) {

        //if (! Gate::allows('users_manage')) {
            //return abort(401);StorePermissionRequest
        //}

        Permission::create($request->all());
        return redirect()->route('permission.index')->with('message', 'Permission added successfully');
       
    }
   
    public function edit($id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $permission = Permission::findOrFail($id);
        return view('admin.accesscontroll.permissionsedit', compact('permission'));
    }

   
    public function update(Request $request, $id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('permission.index')->with('message', 'Permission Updated successfully');;
    }

    
    public function destroy($id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permission.index')->with('deleted', 'Permission deleted successfully');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
