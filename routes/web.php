<?php

//use Analytics;
use App\Events\TaskEvent;
use App\Jobs\testmailjob;
use App\Jobs\verifyEmail;
use App\Jobs\verifyEmailJob;
use App\Mail\ActivationEmail;
use App\Mail\SubscriptionMail;
use App\Mail\testMail;
use App\Models\Page;
use App\Models\Test;
use App\Notifications\InvoiceCreated;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Spatie\Analytics\Period;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;


//Subscriptions and Inquiries
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');
Route::get('/unsubscribe', 'App\AppController@unsubscribe')->name('app.unsubscribe');
Route::post('/inquiry', 'App\AppController@inquiry')->name('app.inquiry');


Route::post('/send', 'App\ChatController@chatSend');
Route::post('/guestsend', 'App\ChatController@guestChatSend');



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


Route::get('/taskeventlisten',function(){

    //Event Listner
    return view('test.test');
});


//=========================================Test Routes=============================================//
Route::get('/inbox',function(){

   $test = new Test;
   $test->type = 'Mailgun';
   $test->value = 'Incoming mailgun mail test';
   $test->save();

   return 'inbox';
    
});

Route::get('send_test_email', function(){

    $user = User::where('email','amitvishwa19@gmail.com')->first();
    $data = [
       'name' => $user->name,
       'password' => 'asdasdasdasd'
    ];

    //Mail::send('email.activation', ['name' => 'Jaysvishwa'], function($message){
        //$message->to('amitvishwa19@gmail.com', 'digizigs') ->subject('thisIsMySucject');
    //});

    $user = User::where('email','amitvishwa19@gmail.com')->first();
    //Mail::to('amitvishwa19@gmail.com')->send(new ActivationEmail);
    dispatch(new verifyEmailJob($user));

});

Route::get('send_mail', function(){
    /*Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->subject('Mailgun and Laravel are awesome!');
        $message->from('info@digizigs.com', 'DigiZigs Mailer');
        $message->to('amitvishwa19@gmail.com');
    });*/
    dispatch(new verifyEmail());
});

Route::get('/signedurl',function(){
	//return URL::signedRoute('app.unsubscribe', ['user' => 1]);
	
	return Auth::user()->profile->avatar_url;
	return URL::temporarySignedRoute(
		'app.unsubscribe', now()->addMinutes(30), ['user' => 1]
	);
	
	


});

Route::get('/authtoken',function(){


    $client = new GuzzleHttp\Client;

    $response = $client->post('http://localhost/digizigs/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'QFvnYx7olfN9z6bYBJ61GUkqT0Os1zykP8KqesRN',
            'username' => 'admin@admin.com',
            'password' => 'password',
            'scope' => '',
        ],
    ]);

    return json_decode((string) $response->getBody(), true);

});
/*
    User registration email verification
    User will redirect to verify email page
*/

Route::get('verifyEmail','Auth\RegisterController@verifyEmail')->name('verifyEmail');
Route::get('activationLink','Auth\RegisterController@activationLink')->name('activationLink');    
Route::post('verifyemail','Auth\RegisterController@resendEmailVerification')->name('resendEmailVerification');
Route::get('activateaccount/{email}/{token}','Auth\RegisterController@activateAccount')->name('activateAccount');     
Route::get('resetpassword','Auth\RegisterController@resetPassword')->name('resetPassword');
Route::post('resetpasswordlink','Auth\RegisterController@resetPasswordLink')->name('resetPasswordLink');
Route::get('reset/{id}','Auth\RegisterController@reset')->name('reset');


Route::get('/getmails',function(){

    $client = new Client();
    $uri = 'http://localhost:8080/digizigs/api/mailbox/info@digizigs.com/inbox';
    
    $params['headers'] = [
                            'Accept' => 'application/json',
                            'Content-type' => 'application/x-www-form-urlencoded',
                            'Authorization' => 'Bearer ' . env('DZ_API_KEY_DEV', null)
                        ];
    $params['form_params'] =[
                                'email' => 'test@gmail.com',
                                'name' => 'Test user',
                                'password' => 'testpassword',
                            ];
    //$request = $client->get($uri, $params );
    //return json_decode($request->getBody(), true);
    

   
    $response = $client->post($uri, $params);
    return json_decode($response->getBody(), true);
    

});

Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderFacebookCallback');

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
    event(new TaskEvent('Hello How are you bro'));
    echo 'TaskEvent Fiered';

});

/*Route::get('/taskeventlisten',function(){

    //Event Listner
    return view('test.test');

});*/
//=========================================Test Routes=============================================//

//=========================================Admin Routes=============================================//
//Route::group(['prefix' => setting('app_admin_url','dz-admin'),'middleware'=>['auth']],function(){
Route::group(['prefix' => setting('app_admin_url','appadmin'),'middleware'=>['auth']],function(){

    
	Route::get('/', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/theme/tables', 'Admin\AdminController@tables')->name('theme.tables');

    //Profile
    Route::resource('/profile', 'Admin\Profile\ProfileController');


	//Contacts
    Route::resource('/contacts', 'Admin\Contact\ContactController');

 
    //Settings
    Route::resource('/settings', 'Admin\SettingController');

    //Articleblock
    //Route::resource('/webblock', 'Admin\WebBlock\WebBlockController');
    Route::resource('/article', 'Admin\Article\ArticleController');

    //Posts
    Route::resource('/post', 'Admin\Post\PostController');

    //PAge
    Route::resource('/page', 'Admin\Page\PageController');

    //Product
    Route::resource('/product', 'Admin\Product\ProductController');

    //Catogery
    Route::resource('/category', 'Admin\Category\CategoryController');
  

    //Menu
    Route::get('/menu', 'Admin\Menu\MenuController@index')->name('menu-index');
    Route::get('/menu/all', 'Admin\Menu\MenuController@allmenu')->name('menu-all');
    Route::post('/menu/add', 'Admin\Menu\MenuController@createnewmenu')->name('create-menu');

    //Gallery
    Route::resource('/gallery','Admin\Gallery\GalleryController');

    //resource
    Route::get('/tags', 'Admin\TagController@index')->name('tags');


    //Chat
    Route::get('/chat', 'Admin\Chat\ChatController@index')->name('chat');
    Route::get('/chatusers', 'Admin\Chat\ChatController@chatUsers');
    Route::get('/conversation/{id}', 'Admin\Chat\ChatController@getMessagesFor');
    Route::post('/conversation/send', 'Admin\Chat\ChatController@send');

    //Mailbox
    //Route::get('/emails/markmail/{id}/edit','Admin\Mail\MailController@markMail');
    ///////Route::get('/mails/markstar/{id}/edit','Admin\Mail\MailController@markstar');
    ///////Route::get('/mails/markread/{id}/edit','Admin\Mail\MailController@markread');
    //Route::get('/emails/movemail','Admin\Mail\MailController@moveMail');
    Route::resource('/emails', 'Admin\Mail\MailController'); //Contact


    //Connects
    Route::resource('/connect', 'Admin\Connects\ConnectController'); //Contact
    Route::resource('/subscription', 'Admin\Contact\SubscriptionController'); //Contact
    Route::resource('/inquiry', 'Admin\Contact\InquiryController'); //Contact

    
    //Access MAnagement
    Route::resource('/accesss', 'Admin\AccessControl\AccessController');
    Route::resource('/users', 'Admin\AccessControl\UserController');
    Route::resource('/roles', 'Admin\AccessControl\RoleController'); //Role
    Route::resource('/permissions', 'Admin\AccessControl\PermissionController'); //Permission

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
        
        Route::get('/invoice/allclient', 'Admin\Client\InvoiceController@clients')->name('invoice.clients'); //Invoice
        Route::get('/invoice/allservice', 'Admin\Client\InvoiceController@services')->name('invoice.services'); //Invoice
        Route::resource('/invoice', 'Admin\Client\InvoiceController'); //Invoice

        Route::get('/quotation/pdf', 'Admin\Client\QuotationController@pdf')->name('quotation.pdf'); //Invoice
        Route::resource('/quotation', 'Admin\Client\QuotationController'); //User

    });

    

    //account-profile
    Route::resource('/profile', 'Admin\Profile\ProfileController'); //Profile

    //OAuth
    Route::resource('/oauth', 'Admin\Oauth\OauthController'); //User

    //Google Analytics
    Route::get('/analytics', 'Admin\Analytics\AnalyticController@index')->name('google.analytics');
    Route::get('/analytics/analyticsdata', 'Admin\Analytics\AnalyticController@alldata')->name('google.topCountries');



    //Logs
    //Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('app.logs');
    Route::get('/logs', 'Admin\LogViewer\LogViewerController@index')->name('app.logs');
    Route::get('/getlogs', 'Admin\LogViewer\LogViewerController@getLogs')->name('app.get.logs');


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