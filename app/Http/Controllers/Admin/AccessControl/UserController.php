<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
   
    public function index() {

        return view('admin.pages.access.users');
    }

    public function create(Request $request) { 

        $roles = Role::orderby('created_at','desc')->get()->toArray();

        if($request->search_string == ''){

            $users = User::orderby('created_at','desc')->with('roles')->paginate(5); 
            return request()->json(200,['roles'=>$roles,'users'=>$users]);

        }else{
            $users['data'] = User::where('firstname','like', '%'.$request->search_string.'%')
                                ->orWhere('lastname','like', '%'.$request->search_string.'%')
                                ->orWhere('email','like', '%'.$request->search_string.'%')                                 
                                ->orderby('created_at','desc')->with('roles')->get();
            return request()->json(200,['roles'=>$roles,'users'=>$users]);
        }
    }

    
    public function store(Request $request) { 

        $this->validate($request, [          
            'firstname' => 'required|string|max:200',
            'lastname' => 'required|string|max:200',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);  
        //return $request->roles;

        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/

        $user = User::create($request->all());
        $roles = $request->roles;

        //$roles = $request->input('roles') ? $request->input('roles') : [];
        //dd($roles);
        $user->assignRole($roles);
        $users = User::orderby('created_at','desc')->with('roles')->paginate(5);
        return request()->json(200,$users);
       
    }
   
    public function edit($id) {

        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        //$client = Client::find($id);
        //return request()->json(200,$client);
      
        //$roles = Role::get()->pluck('name', 'name');
        $roles = Role::orderby('created_at','desc')->get()->toArray();
        $user = User::where('id',$id)->with('roles')->first();
        return request()->json(200,['roles'=>$roles,'user'=>$user]);
    }
    
    public function update(Request $request, $id){

        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/

      $user = User::findOrFail($id);
      $user->firstname = $request->firstname;
      $user->lastname = $request->lastname;
      $user->email = $request->email;
      $user_save = $user->save();

      $roles = $request->roles;
      $user->syncRoles($roles);


      if($user_save){
         $users = User::orderby('created_at','desc')->with('roles')->paginate(5);
         //return request()->json(200,$users);
         return $users;
      }
    }

    public function destroy($id) {

      /*if (! Gate::allows('users_manage')) {
            return abort(401);
        } */      

        $user = User::find($id);
        $is_deleted=$user->delete();
        if($is_deleted){
            $users = User::orderby('created_at','desc')->paginate(5);
            return request()->json(200,$users);
        }
    }

    public function massDestroy(Request $request) {
        
      /*  if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/

        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
