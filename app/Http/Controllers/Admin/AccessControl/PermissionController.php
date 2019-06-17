<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionRequest;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index() {

        $permissions = Permission::orderby('created_at','desc')->paginate(10);  
        return view('admin.pages.access.permissions', compact('permissions'));
    }

    public function create(Request $request) {  


        if($request->search_string == ''){
            $permissions = Permission::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$permissions);
        }else{
            $permissions['data'] = Permission::where('name','like', '%'.$request->search_string.'%')                               
                                ->orderby('created_at','desc')->get();
            return request()->json(200,$permissions);
        }

    }

   
    public function store(StorePermissionRequest $request) {

        //if (! Gate::allows('users_manage')) {
            //return abort(401);StorePermissionRequest
        //}
        
        $this->validate($request, [          
            'name' => 'required|string|max:200',
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        $permission = Permission::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$permission);

       
       
    }
   
    public function edit($id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
       
        $permission = Permission::find($id);
        return request()->json(200,$permission);


    }

   
    public function update(Request $request, $id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        
        $this->validate($request, [          
            'name' => 'required|string|max:200',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        $permission = Permission::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$permission);
    }

    
    public function destroy($id) {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/

        $permission = Permission::find($id);
        $is_deleted=$permission->delete();
        if($is_deleted){
            $permission = Permission::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$permission);
        }
       
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
