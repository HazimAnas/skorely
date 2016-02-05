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

Route::get('/', function () {
    return view('index/index');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/login', function () {
    return view('auth/login');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix'=>'api','middleware' => 'cors'], function () {
	Route::resource('programs', 'ProgramController');
	Route::resource('teams', 'TeamController');
	Route::resource('activities', 'ActivityController');
	Route::resource('points', 'PointController');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('programs', 'ProgramController');
});

Route::group(['prefix'=>'program', 'middleware' => 'auth'], function () {
	Route::resource('teams', 'TeamController');
	Route::resource('activities', 'ActivityController');
	Route::resource('points', 'PointController');
});

