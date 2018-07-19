<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('users', 'AuthController@getAll');

Route::post('auth/register', 'AuthController@register');

Route::get('user/{id}', 'AuthController@getUser');

Route::delete('user/{id}', 'AuthController@deleteUser');

Route::put('user/{id}', 'AuthController@editUsers');


Route::get('events', 'EventController@getAll');

Route::get('event/{id}', 'EventController@getEvent');

Route::post('event', 'EventController@generateEvent');

Route::delete('event/{id}', 'EventController@deleteEvent');

Route::put('event/{id}', 'EventController@editEvent');


Route::get('categories', 'CategoryController@getAll');

Route::get('category/{id}', 'CategoryController@getCategory');

Route::post('category', 'CategoryController@generateCategory');

Route::delete('category/{id}', 'CategoryController@deleteCategory');

Route::put('category/{id}', 'CategoryController@editCategory');