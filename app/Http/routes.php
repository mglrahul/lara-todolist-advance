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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/edit/{task}', 'TaskController@edit');
Route::post('/update/{task}', 'TaskController@update');
Route::get('/paging', 'TaskController@paging');
Route::get('profile', 'UserController@profile');
Route::post('profile-update', 'UserController@profile_update');


