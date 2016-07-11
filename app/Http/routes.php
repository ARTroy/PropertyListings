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
Route::group(['middleware' =>'web'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('/property/{id}', 'PropertyController@view');

	// Public invite code claim
	Route::get('/claim', 'InviteController@claim_create');
	Route::post('/claim', 'InviteController@claim_store');

	// Public auth
	Route::post('/login', 'AuthController@login');
	Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
	Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
	Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

	//User property
	Route::group(['middleware' => ['auth']], function(){
	    Route::get('/properties', 'PropertyControllerr@profileIndex');
	    Route::get('/properties/{id}/edit', 'PropertyControllerr@edit');
	    Route::post('/properties/store', 'PropertyControllerr@store');
	    Route::post('/properties/store/rooms', 'PropertyControllerr@rooms');
	});

	//Admin
	Route::group(['middleware' => ['admin']],  function(){
		Route::get('admin/properties', 'PropertyControllerr@index');
		Route::get('admin/properties/{id}/edit', 'PropertyControllerr@edit');
		Route::post('admin/properties/store', 'PropertyControllerr@updateStoreAny');

		Route::get('admin/invites', 'InviteController@index_create');
		Route::post('admin/user/create', 'AuthController@create');
	});
});