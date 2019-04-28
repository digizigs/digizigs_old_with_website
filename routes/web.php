<?php

//use Analytics;
use App\Events\TaskEvent;
use App\Jobs\testmailjob;
use App\Mail\testMail;
use App\Models\Page;
use App\Notifications\InvoiceCreated;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Spatie\Analytics\Period;


//Subscriptions and Inquiries
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');
Route::get('/unsubscribe', 'App\AppController@unsubscribe')->name('app.unsubscribe');
Route::post('/inquiry', 'App\AppController@inquiry')->name('app.inquiry');




//============================================App Routes===========================================//
Route::get('/', 'App\AppController@index')->name('apphome');

Route::get('/contact', 'App\AppController@contact')->name('contact');

Route::get('/blog', 'App\PostController@allPosts')->name('app.blog');
Route::get('/blog/{slug}', 'App\PostController@detailPosts')->name('app.blog.detail');
Route::get('/blog/author/{author}', 'App\PostController@postByAuthor')->name('app.blog.author');
Route::get('/blog/category/{category}', 'App\PostController@postByCategory')->name('app.blog.category');


Route::get('/about', 'App\AppController@about')->name('app.about');

Route::get('/portfolio', 'App\AppController@portfolio')->name('app.portfolio');
//============================================App Routes===========================================//





//=========================================Test Routes=============================================//
Route::get('/mail',function(){

    $contact = App\Models\Contact::where('email','jaysvishwa@gmail.com')->first();
    //$job = (new testmailjob())->delay(Carbon::now()->addSeconds(10));
    //$job = (new testmailjob($contact));
    //dispatch($job);

    Mail::to('jaysvishwa@gmail.com')
            ->send(new testMail($contact));

    return 'Mail sent successfully';
});

Auth::routes();

Route::get('/notify',function(){
   
    //Notification 
    $users = User::all();
    $newinvoice = collect(['title'=>'New invoice Created','body'=>'New invoice created for client']);
    Notification::send($users, new InvoiceCreated($newinvoice));
    echo 'Notify Success';
   
}); 

Route::get('/taskevent',function(){

    //Event Fire
    event(new TaskEvent('Hello How are you'));
    echo 'TaskEvent Fiered';

});

Route::get('/taskeventlisten',function(){

    //Event Listner
    return view('test.test');

});
//=========================================Test Routes=============================================//



//=========================================Admin Routes=============================================//
Route::group(['prefix' => setting('app_admin_url','dz-admin'),'middleware'=>['auth']],function(){

    
	Route::get('/', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/theme/tables', 'Admin\AdminController@tables')->name('theme.tables');


	//Contacts
    Route::resource('/contacts', 'Admin\Contact\ContactController');

 
    //Settings
    Route::resource('/settings', 'Admin\SettingController');

    //Posts
    Route::resource('/post', 'Admin\Post\PostController');

    //PAge
    Route::resource('/page', 'Admin\Page\PageController');


    //Catogery
    Route::resource('/category', 'Admin\CategoryController');
  

    //Menu
    Route::get('/menu', 'Admin\Menu\MenuController@index')->name('menu-index');
    Route::get('/menu/all', 'Admin\Menu\MenuController@allmenu')->name('menu-all');
    Route::post('/menu/add', 'Admin\Menu\MenuController@createnewmenu')->name('create-menu');

    //Gallery
    //Route::get('/gallery','Admin\Gallery\GalleryController@index')->name('gallery.show');
    //Route::get('/gallery/create','Admin\Gallery\GalleryController@create');
    //Route::post('/formSubmit','Admin\Gallery\GalleryController@store');
    //Route::get('/gallery/delete','Admin\Gallery\GalleryController@destroy');
    Route::resource('/gallery','Admin\Gallery\GalleryController');

    //resource
    Route::get('/tags', 'Admin\TagController@index')->name('tags');

    
    //Contact Management
    Route::group(['prefix' => 'contact'], function(){
        Route::resource('/subscription', 'Admin\Contact\SubscriptionController'); //Contact
        Route::resource('/inquiry', 'Admin\Contact\InquiryController'); //Contact
    });

    //Access MAnagement
    Route::group(['prefix' => 'access'], function(){
        Route::resource('/roles', 'Admin\AccessControl\RoleController'); //Role
        Route::resource('/permissions', 'Admin\AccessControl\PermissionController'); //Permission
        Route::resource('/users', 'Admin\AccessControl\UserController'); //User
    });

    //Client MAnagement
    Route::group(['prefix' => 'client'], function(){
        Route::resource('/service', 'Admin\Client\ServiceController'); //User
        Route::resource('/project', 'Admin\Client\ProjectController'); //User
        Route::resource('/client', 'Admin\Client\ClientController'); //User
        Route::resource('/billing', 'Admin\Client\BillingController'); //User
        
        Route::get('/invoice/allclient', 'Admin\Client\InvoiceController@clients')->name('invoice.clients'); //User
        Route::get('/invoice/allservice', 'Admin\Client\InvoiceController@services')->name('invoice.services'); //User
        Route::resource('/invoice', 'Admin\Client\InvoiceController'); //User

        Route::resource('/quotation', 'Admin\Client\quotationController'); //User


    });

    //Inventory Management
    Route::group(['prefix' => 'inventory'], function(){
        Route::resource('/product', 'Admin\Inventory\ProductController'); //Product

    });

    //account-profile
    Route::resource('/profile', 'Admin\Profile\ProfileController'); //User



    //testlab
    Route::get('/analytics', 'Admin\Analytics\AnalyticController@index')->name('google.analytics');

    //Logs
    //Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('app.logs');
    Route::get('/logs', 'Admin\LogViewer\LogViewerController@index')->name('app.logs');


    Route::get('/marknotificationread', 'Admin\AdminController@markAllNotificationRead')->name('marknotificationread');

});
//=========================================Admin Routes=============================================//

Route::get('{page}',function($slug){
   
    $page = \App\Models\Page::findBySlug($slug);

    $view = "app/pages/{$page->slug}";
   
    if(view()->exists($view)){
        return view("app/pages/{$page->slug}",compact($page));
    }else{
        return abort(404);
    }
   
});    