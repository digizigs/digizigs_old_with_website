<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::group(['prefix' => 'mailgun','middleware' => ['mailgun.webhook'],],function () {

    Route::post('widgets', 'MailgunWidgetsController@store');

});*/


Route::group(['prefix' => 'mailgun'],function () {

    Route::post('inbound', 'Admin\Mail\MgInboundController@inbound');
    Route::post('store', 'Admin\Mail\MGInboundController@store');
    Route::get('apitest', 'Admin\Mail\MgInboundController@apitest');
    Route::get('nexmo', 'Admin\Mail\MgInboundController@nexmo');
    
});


//Route::apiResource('mails', 'Api\MailController')->middleware('auth:api');
Route::group(['prefix' => 'mailbox','middleware' => ['auth:api']],function () {

	Route::post('/{email}/inbound/', 'Api\MailController@inbound');
	Route::apiResource('/{email}/{type}/', 'Api\MailController');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
