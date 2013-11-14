<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$giffyControllers = 'Giffy\Controllers\\';

Route::group(array('prefix' => 'gifs'), function() use ($giffyControllers)
{
	Route::get('/', array('uses' => $giffyControllers.'GifController@index'));
	Route::get('/mine', array('uses' => $giffyControllers.'GifController@mine'));
	Route::post('/mine/{gif_id}', array('uses' => $giffyControllers.'GifController@addToMine'));
	Route::delete('/mine/{gif_id}', array('uses' => $giffyControllers.'GifController@removeFromMine'));
	Route::get('/create', array('uses' => $giffyControllers.'GifController@create'));
	Route::get('/show/{gif_id}', array('uses' => $giffyControllers.'GifController@show'));
	Route::post('/create', array('uses' => $giffyControllers.'GifController@save'));
});

Route::group(array('prefix' => 'user'), function() use ($giffyControllers)
{
	Route::get('/login', array('uses' => $giffyControllers.'UserController@login'));
	Route::post('/login', array('uses' => $giffyControllers.'UserController@doLogin'));
	Route::get('/logout', array('uses' => $giffyControllers.'UserController@logout'));
});

Route::get('/', array('uses' => $giffyControllers.'GifController@index'));

/*
Route::get('api/me', 'ApiUserController@getMe');
Route::get('api/logout', 'ApiUserController@doLogout');
Route::post('api/login', 'ApiUserController@postLogin');
Route::get('api/gifs/mine', 'ApiGifController@getMine');
Route::get('api/gifs/{limit?}', 'ApiGifController@getIndex');
Route::get('api/gifs/limit/{limit}', 'ApiGifController@getIndex');
Route::get('api/gifs/limit/{limit}/offset/{offset}', 'ApiGifController@getIndex');
*/