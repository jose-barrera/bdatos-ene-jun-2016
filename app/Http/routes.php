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
})->name('index');

Route::auth();

// Route::get('/home', 'HomeController@index');

// Route::controller('lessors', 'LessorController');

// Route::group(['prefix' => 'properties'], function () {
// 	Route::get('/', 'PropertiesController@index');
// 	Route::post('/', 'PropertiesController@store');
// 	Route::get('/{id}', 'PropertiesController@show');
// 	Route::get('/create', 'PropertiesController@create');
// });

// Route::controller('tenants', 'TenantsController');

// Route::get('properties/{id}', 'PropertiesController@getIndex');
// Route::controller('properties', 'PropertiesController');

Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

Route::resource('properties', 'PropertiesController');
