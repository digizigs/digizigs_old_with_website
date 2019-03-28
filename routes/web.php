<?php

//use Analytics;
use App\Jobs\NewBlogNotiJob;
use App\Mail\NewBlog;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Spatie\Analytics\Period;


//Subscriptions and Inquiries
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');
Route::post('/inquiry', 'App\AppController@inquiry')->name('app.inquiry');



//App
Route::get('/', 'App\AppController@index')->name('apphome');
Route::get('/contact', 'App\AppController@contact')->name('contact');

Route::get('/blog', 'App\AppController@blog')->name('app.blog');
Route::get('/about', 'App\AppController@about')->name('app.about');
Route::get('/portfolio', 'App\AppController@portfolio')->name('app.portfolio');


Route::get('/email',function(){
    
    $job = (new NewBlogNotiJob)->delay(Carbon::now()->addSeconds(10));
    dispatch($job);
    return 'MAil sent successfully'         ;


});

Route::get('newblogs',function(){
    
    event(new NewBlog('New Blog Posted'));
    //return 'Event Created Successfully';

});


//Route::get('/homenew', 'App\AppController@home2')->name('apphome2');
//Route::get('/registrationsuccess','Auth\Registercontroller@registerSuccess')->name('registrationsuccess');    //After registration  verify msg
//Route::get('/verifyAccount/{verifyToken}','Auth\Registercontroller@verifyAccount')->name('verifyAccount');    //After registration  verify msg

//Route::resource('/blog', 'App\BlogController');
//Route::resource('/blog', 'Blog\BlogController');
//Route::resource('/ecom', 'Ecom\EcomController');

Auth::routes();




//Route::get('/home', 'HomeController@index')->name('home');
//Admin Route Group   //['prefix' => 'dz-admin','middleware'=>['auth','admin']] //setting('admin_url','admin')
Route::group(['prefix' => setting('app_admin_url','dz-admin'),'middleware'=>['auth']],function(){

    
	Route::get('/', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/theme/tables', 'Admin\AdminController@tables')->name('theme.tables');


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
        Route::resource('/invoice', 'Admin\Client\InvoiceController'); //User
    });

    //account-profile
    Route::resource('/profile', 'Admin\Profile\ProfileController'); //User



    //testlab
    Route::get('/analytics', function(){

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(180));
        $most_visited_page = Analytics::fetchMostVisitedPages(Period::days(30));
        $analytics = Analytics::getAnalyticsService();
        $pages = Analytics::fetchMostVisitedPages(Period::days(7));
        $trending = app('App\Services\Trending')->week(7,15);

        //dd($most_visited_page);
        
        return view('admin.pages.analytics.analytics',compact('trending','analyticsData'));


    })->name('google.analytics');

});

Route::get('{page}',function($slug){
   
    $page = \App\Models\Page::findBySlug($slug);

    $view = "app/pages/{$page->slug}";
   
    if(view()->exists($view)){
        return view("app/pages/{$page->slug}",compact($page));
    }else{
        return abort(404);
    }
   
});    