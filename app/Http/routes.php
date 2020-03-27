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
Route::get('/search','HomeController@search');

// Public invite code claim
Route::get('/claim', 'InviteController@claim_create');
Route::post('/claim', 'InviteController@claim_store');

// Public auth
Route::post('/login', 'AuthController@login');
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
Route::get('/password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'PasswordController@showResetForm']);
Route::post('/password/email', ['as' => 'auth.password.email', 'uses' => 'PasswordController@sendResetLinkEmail']);
Route::post('/password/reset', ['as' => 'auth.password.reset', 'uses' => 'PasswordController@reset']);


Route::group(['middleware' => ['auth']], function(){
    Route::get('/profile', 'UserController@profile');
    Route::get('/properties/create', 'PropertyController@create');
    Route::get('/properties/{id}/rooms', 'PropertyController@create_rooms');
    Route::get('/properties/{id}/edit', 'PropertyController@edit');
    Route::get('/properties/{id}/publish', 'PropertyController@publish');
    Route::post('/properties/store', 'PropertyController@store');
    Route::post('/properties/{id}/update', 'PropertyController@update');
    Route::post('/properties/{id}/store/rooms', 'PropertyController@store_rooms');
    Route::post('/properties/{id}/publish', 'PropertyController@publish_store');
    Route::post('/properties/{id}/store/published', 'PropertyController@published_update');
    Route::get('/properties/{property_id}/room/{room_id}/delete', 'PropertyController@delete_room');
});
 
//Admin
Route::group(['middleware' => ['admin']],  function(){
	//Route::get('admin/properties', 'UserController@profileAdmin');
	//Route::get('admin/properties/{id}/edit', 'PropertyController@edit');
	//Route::post('admin/properties/store', 'PropertyController@updateStoreAny');
	Route::get('admin/invites', 'InviteController@index_create');
    Route::post('admin/invites', 'InviteController@store');
	Route::post('admin/user/create', 'AuthController@create');
});