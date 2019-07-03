<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\User;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessController extends Controller
{
   
    public function index(){
        return view('admin.pages.access.accesscontrol');
    }

    
    public function create(Request $request){
        $users = User::orderby('created_at','desc')->with('roles')->paginate(5);
        $roles = Role::orderby('created_at','desc')->with('permissions')->paginate(5);
        $permissions = Permission::orderby('created_at','desc')->paginate(5); 
        return request()->json(200,['roles'=>$roles,'permissions'=>$permissions,'users'=>$users]);
    }

    
    public function store(Request $request){
        //
    }

    
    public function show($id){
        //
    }

    
    public function edit($id){
        //
    }

   
    public function update(Request $request, $id){
        //
    }

    
    public function destroy($id){
        //
    }
}
