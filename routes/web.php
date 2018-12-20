<?php

//use Analytics;
use Spatie\Analytics\Period;


//App
Route::get('', 'App\AppController@index')->name('apphome');
Route::get('/registrationsuccess','Auth\Registercontroller@registerSuccess')->name('registrationsuccess');    //After registration  verify msg
Route::get('/verifyAccount/{verifyToken}','Auth\Registercontroller@verifyAccount')->name('verifyAccount');    //After registration  verify msg
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');
Route::get('/blog', 'Blog\BlogController@index')->name('blog');
Route::get('/ecom', 'Ecom\EcomController@index')->name('blog');
Route::get('/resume', 'Web\AppController@index')->name('app.resume');
Route::get('/curtainmenu', 'Web\AppController@curtainmenu')->name('app.resume');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Admin Route Group   //['prefix' => 'dz-admin','middleware'=>['auth','admin']]
Route::group(['prefix' => 'dz-admin','middleware'=>['auth']],function(){

    
	Route::get('/', 'Admin\DashboardController@index')->name('admin.home');

	//Settings
    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\SettingController@store')->name('admin.settings.store');


    //Posts
    Route::get('/post/all', 'Admin\PostController@index')->name('post.all');
    Route::get('/post/new', 'Admin\PostController@create')->name('post.new');
    Route::resource('/post/publishpost', 'Admin\PostController');

    //Catogery
    Route::get('/cat', 'Admin\CategoryController@cat')->name('cat');
    Route::get('/category', 'Admin\CategoryController@index')->name('categories');
    Route::get('/getcategory', 'Admin\CategoryController@getcategories')->name('post.getcategory');
    Route::post('/savecategory', 'Admin\CategoryController@store')->name('post.category.save');
    Route::resource('/updatecategory', 'Admin\CategoryController');

    //Tag
    Route::get('/tags', 'Admin\TagController@index')->name('tags');


    //Subscription and Contacts
    Route::get('/connects/subscriptions', 'Admin\SubscriptionController@index')->name('subscriptions');
    Route::get('/connects/getsubscriptions', 'Admin\SubscriptionController@getSubscription')->name('get.subscriptions');


    //Access Management
    Route::get('/accessmanagement/roles', 'Admin\RoleController@index')->name('accessmanagement.roles');
    Route::get('/accessmanagement/getroles', 'Admin\RoleController@getroles');
    Route::resource('/accessmanagement/addrole', 'Admin\RoleController');

    Route::get('/accessmanagement/permissions', 'Admin\PermissionController@index')->name('accessmanagement.permissions');
    Route::get('/accessmanagement/getpermissions', 'Admin\PermissionController@getpermission');
    Route::resource('/accessmanagement/addpermission', 'Admin\PermissionController');


    Route::get('/accessmanagement/users', 'Admin\UserController@index')->name('accessmanagement.users');

    //Media Library
    Route::get('/medialibrary/gallery', 'Admin\MedialibraryController@index')->name('medialibrary.gallery');





    //testlab
    Route::get('/testlab/test', function(){

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        dd($analyticsData);
        return view('admin.test');
    })->name('testlab');

});    