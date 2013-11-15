<?php

$giffyControllers = 'Giffy\Controllers\\';
$giffyApiControllers = 'Giffy\Controllers\Api\\';

Route::group( array( 'prefix' => 'gifs' ), function() use ( $giffyControllers ) {
		Route::get( '/', array( 'uses' => $giffyControllers.'GifController@index' ) );
		Route::get( '/mine', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@mine' ) );
		Route::post( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@addToMine' ) );
		Route::delete( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@removeFromMine' ) );
		Route::get( '/create', array( 'uses' => $giffyControllers.'GifController@create' ) );
		Route::get( '/show/{gif_id}', array( 'uses' => $giffyControllers.'GifController@show' ) );
		Route::post( '/create', array( 'uses' => $giffyControllers.'GifController@save' ) );
	} );

Route::group( array( 'prefix' => 'tags' ), function() use ( $giffyControllers ) {
		Route::post( '/save', array( 'uses' => $giffyControllers.'TagController@save' ) );
	} );

Route::group( array( 'prefix' => 'user' ), function() use ( $giffyControllers ) {
		Route::get( '/login', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@login' ) );
		Route::post( '/login', array( 'uses' => $giffyControllers.'UserController@doLogin' ) );
		Route::get( '/logout', array( 'uses' => $giffyControllers.'UserController@logout' ) );
	} );

Route::group( array( 'prefix' => 'api' ), function() use ( $giffyApiControllers ) {
		Route::get( '/me', $giffyApiControllers.'ApiUserController@me' );
		Route::get( '/logout', $giffyApiControllers.'ApiUserController@logout' );
		Route::post( '/login', $giffyApiControllers.'ApiUserController@login' );
		Route::get( '/tags/all', $giffyApiControllers.'ApiTagController@all' );
		Route::get( '/gifs/mine', $giffyApiControllers.'ApiGifController@mine' );
		Route::get( '/gifs/{limit?}', $giffyApiControllers.'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}', $giffyApiControllers.'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}/offset/{offset}', $giffyApiControllers.'ApiGifController@fetch' );
	} );


Route::get( '/', array( 'uses' => $giffyControllers.'GifController@index' ) );
