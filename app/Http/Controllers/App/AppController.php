<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Connect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AppController extends Controller
{
   
    public function index(){


        //$role = Role::create(['name'=>'writer']);
        //$permission = Permission::create(['name' => 'edit articles']);
        //return Auth()->user();
        //$role = Role::findById(2);
        //$permission = Permission::findById(4);

        //$role->givePermissionTo($permission);
        //Auth()->user()->givePermissionTo('write post');
        //Auth()->user()->assignRole('writer');

        //return Auth()->user()->permissions;

        
        return view('app/home');

    }


    public function subscribe(Request $request){

    	 $data = Validator::make($request->all(),[           
            'email'=>'required|max:255|email',          
        ],[          
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',          
        ])->Validate();


    	$email = $request->email;

    	$connect = new Connect;
    	$connect->email = $email;
    	$connect->type = 'subscription';
    	$is_save = $connect->save();

    	if ($is_save){
    		return redirect()->back()->with('subscription','Subscription done');
    	}   
    }

    public function generatePdf(){
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('app/pdf', $data);

         return $pdf->download('itsolutionstuff.pdf');
    }




}
