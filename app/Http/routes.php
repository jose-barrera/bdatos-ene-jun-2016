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

// Route::get('/', function () {
//     if(Auth::guest())
//         return redirect('login');
//     else
//         return redirect('messages');
// })->name('index');

Route::get('/', function () {
    return redirect('messages');
})->middleware('auth')->name('index');

Route::get('terms', function () {
    return view('terms');
})->name('terms');

Route::auth();

Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

// Route::get('/properties/{id}/rent', 'PropertiesController@getRent')
//     ->name('properties.get_rent');
// Route::post('/properties/{id}/rent', 'PropertiesController@postRent')
//     ->name('properties.post_rent');
// Route::delete('/properties/{id}/rent/delete', 'PropertiesController@deleteRent')
//     ->name('properties.delete_rent');
// Route::resource('properties', 'PropertiesController');

Route::group([
    'prefix' => '/properties/{id}/rent',
    'as' => 'properties.rent.'
    ], function () {
        Route::get('/', 'PropertiesController@getRent')->name('get');
        Route::post('/', 'PropertiesController@postRent')->name('post');
        Route::delete('/', 'PropertiesController@destroyRent')->name('destroy');
    }
);
Route::resource('properties', 'PropertiesController');

Route::resource('messages', 'MessagesController');
