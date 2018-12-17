<?php



//App
Route::get('', 'App\AppController@index')->name('apphome');
Route::get('/registrationsuccess','Auth\Registercontroller@registerSuccess')->name('registrationsuccess');    //After registration  verify msg
Route::get('/verifyAccount/{verifyToken}','Auth\Registercontroller@verifyAccount')->name('verifyAccount');    //After registration  verify msg
Route::post('/subscribe', 'App\AppController@subscribe')->name('app.subscribe');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
