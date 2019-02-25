<?php

namespace App\Http\Controllers\App;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\Post;

class AppController extends Controller
{
   
    public function index(){

        //return app_setting('app_name');

        $homepage = setting('home_page');
        $post_per_page = setting('post_per_page');

        if($homepage == 1){
            return view('app/pages/home');
        }else{
            $posts = Post::orderby('created_at','desc')->where('type', 'post')->with('user')->paginate($post_per_page);
            return view('app.pages.post',compact('posts'));
        }     

    }

    public function home2(){
        return view('app/home2');
    }

    public function contact(){
        return view('app.pages.contact');
    }

    public function subscribe(Request $request){

    	$data = Validator::make($request->all(),[           
            'email'=>'required|max:255|email',          
        ],[          
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',          
        ])->Validate();


    	$email = $request->email;

    	$connect = new Subscription;
    	$connect->email = $email;
    	$is_save = $connect->save();
        
        //flash('Message')->important();
        
    	if ($is_save){
            Alert::message('Robots are working!');
    		return redirect()->back()->with('subscription','Subscription done');
    	}   
    }

    public function inquiry(Request $request){

        $data = Validator::make($request->all(),[    
            'name'=>'required',
            'contact'=>'required',
            'email'=>'required|max:255|email',       
            'message'=>'required',          
        ],[      
            'name.required' => 'Name is required',
            'contact.required' => 'Contact number is required',
            'email.required' => 'Email is required',
            'email.required' => 'Email is required',
            'message.email' => 'Please enter your query',          
        ])->Validate();

        $name = $request->name;
        $contact = $request->contact;
        $email = $request->email;
        $message = $request->message;

        $connect = new Inquiry;
        $connect->name = $name;
        $connect->contact = $contact;
        $connect->email = $email;
        $connect->message = $message;
        $is_save = $connect->save();
      
        
        if ($is_save){
            return redirect()->back()->with('contact','Inquiry submited successfully');
        }   
    }

    public function generatePdf(){
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('app/pdf', $data);

         return $pdf->download('itsolutionstuff.pdf');
    }

    public function blog(){
        return 'Blog';
    }



}
