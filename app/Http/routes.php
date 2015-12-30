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

Route::group(['prefix'=>'api','middleware' => 'cors'], function () {
	Route::resource('programs', 'ProgramController');
	Route::resource('teams', 'TeamController');
	Route::resource('activities', 'ActivityController');
	Route::resource('points', 'PointController');
});

Route::resource('programs', 'ProgramController');

Route::group(['prefix'=>'program'], function () {
	Route::resource('teams', 'TeamController');
	Route::resource('activities', 'ActivityController');
	Route::resource('points', 'PointController');
});