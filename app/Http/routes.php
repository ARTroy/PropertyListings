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

Route::get('/', 'HomeController@index');
Route::get('/property/{id}', 'PropertyController@view');

Route::group(['middleware' => 'auth'], function(){
    Route::get('user/properties', 'PropertyControllerr@profileIndex');
    Route::get('admin/properties/{id}/edit', 'PropertyControllerr@edit');
    Route::post('admin/properties/store', 'PropertyControllerr@updateStore');
});

Route::group(['middleware' => 'admin'],  function(){
		Route::get('admin/properties', 'PropertyControllerr@index');
		Route::get('admin/properties/{id}/edit', 'PropertyControllerr@edit');
		Route::post('admin/properties/store', 'PropertyControllerr@updateStore');
		Route::resource('admin/invitecodes', 'InviteCodeController');
});
