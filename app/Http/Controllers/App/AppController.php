<?php

namespace App\Http\Controllers\App;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppController extends Controller {
   
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

    public function blog(){
        return view('app.pages.post');
    }
    public function about(){
        return view('app.pages.about');
    }
    public function portfolio(){
        return view('app.pages.portfolio');
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

    	$connect = new Contact;
    	$connect->email = $email;
        $connect->type = 'newsletter';
    	$is_save = $connect->save();
        
        //flash('Message')->important();
        
    	if ($is_save){          
    		return view('app.pages.newsletter_redirect');
    	}   
    }

    public function inquiry(Request $request){

        $data = Validator::make($request->all(),[    
            'name'=>'required',
            'contact'=>'required',
            'email'=>'required|max:255|email',                          
        ],[      
            'name.required' => 'Name is required',
            'contact.required' => 'Contact number is required',
            'email.required' => 'Email is required',
            'email.required' => 'Email is required',                    
        ])->Validate();

        $name = $request->name;
        $contact = $request->contact;
        $email = $request->email;
        $message = $request->message;

        $connect = new Contact;
        $connect->name = $name;
        $connect->contact = $contact;
        $connect->email = $email;
        $connect->message = $message;
        $connect->type = 'inquiry';
        $is_save = $connect->save();
      
        
        if ($is_save){
            return view('app.pages.contact_redirect');
        }   
    }

    public function generatePdf(){
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('app/pdf', $data);

         return $pdf->download('itsolutionstuff.pdf');
    }

  



}
