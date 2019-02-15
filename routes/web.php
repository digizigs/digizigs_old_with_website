<?php

//use Analytics;
use App\Models\Page;
use Spatie\Analytics\Period;


//App
Route::get('/', 'App\AppController@index')->name('apphome');
Route::post('/inquiry', 'App\AppController@inquiry')->name('app.inquiry');
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');

/*Route::get('{page}',function($slug){

    $page = \App\Models\Page::findBySlug($slug);
    $view = "app/pages/{$page->slug}";
   

    return view()->first([
        "app/pages/{$page->slug}",
        'app/page',     
    ],compact('page'));
   
});*/


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


    //Asset preset theme pages





	//Settings
    Route::resource('/settings', 'Admin\SettingController');
    //Route::post('/settings/general', 'Admin\SettingController@set_general_setting')->name('setting.general.save');


    //Posts
    Route::resource('/post', 'Admin\Post\PostController');
    //Route::get('/allpost', 'Admin\Post\PostController@getallpost');
    //Route::get('/getDestroy', 'Admin\Post\PostController@getallpost')->name('post.delete');
    //Route::get('/post/getallpost', 'Admin\Post\PostController@getallpost');

    //PAge
    Route::resource('/page', 'Admin\Page\PageController');


    //Catogery
    Route::resource('/category', 'Admin\CategoryController');
    //Route::get('/cat', 'Admin\CategoryController@cat')->name('cat');
    //Route::get('/category', 'Admin\CategoryController@index')->name('categories');
    //Route::get('/getcategory', 'Admin\CategoryController@getcategories')->name('post.getcategory');
    //Route::post('/savecategory', 'Admin\CategoryController@store')->name('post.category.save');
    //Route::resource('/updatecategory', 'Admin\CategoryController');


    //Menu
    Route::get('/menu', 'Admin\Menu\MenuController@index')->name('menu-index');
    Route::get('/menu/all', 'Admin\Menu\MenuController@allmenu')->name('menu-all');
    Route::post('/menu/add', 'Admin\Menu\MenuController@createnewmenu')->name('create-menu');


    //Tag
    Route::get('/tags', 'Admin\TagController@index')->name('tags');


    //Subscription and Contacts
    //Route::get('/connects/subscriptions', 'Admin\Connect\SubscriptionController@index')->name('subscriptions');
    //Route::get('/connects/getsubscriptions', 'Admin\Connect\SubscriptionController@getSubscription')->name('get.subscriptions');
    
    
    //Access MAnagement
    Route::group(['prefix' => 'connect'], function(){
        Route::resource('/subscription', 'Admin\Connect\SubscriptionController'); //Contact
        Route::resource('/inquiry', 'Admin\Connect\InquiryController'); //Contact
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


    //Media Library
    Route::get('/medialibrary/gallery', 'Admin\MedialibraryController@index')->name('medialibrary.gallery');





    //testlab
    Route::get('/testlab/test', function(){

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        dd($analyticsData);
        return view('admin.test');
    })->name('testlab');

});    