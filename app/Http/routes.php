<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('test', function () {
    return view('welcome');
});

//Route::resource('bus-book','MenuController');

Route::get('/','MenuController@index');
//Route::get('bus-book','MenuController@BusBook');
//Route::post('bus-book/save','MenuController@StoreBook');
//Route::get('email','MenuController@AddEmail');
//Route::post('email/save','MenuController@SaveEmail');
Route::post('weixin','WeixinController@getMessage');
Route::get('weixin','WeixinController@index');
Route::get('setbutton','WeixinController@setButton');
