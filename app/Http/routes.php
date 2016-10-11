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

Route::group(['middleware' => 'auth:web'], function () {
	Route::get('/', function () {
	    return view('welcome');
	});
});

Route::group(['middleware' => 'auth:admin'], function () {
	Route::get('/admin', function () {
	    return view('admin');
	});
});


Route::get('/login', 'Auth\AuthController@index');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@logout');


Route::get('/admin/login', 'Admin\AuthController@index');
Route::post('/admin/login', 'Admin\AuthController@login');
Route::get('/admin/logout', 'Admin\AuthController@logout');


