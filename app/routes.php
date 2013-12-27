<?php

$giffyControllers = 'Giffy\Controllers\\';
$giffyApiControllers = 'Giffy\Controllers\Api\\';

$domain = ( App::environment() == 'production' ) ? 'giffy.co' : 'giffy.dev';


Route::group( array( 'domain' => 'api.' . $domain ), function() use ( $giffyApiControllers ) {
		Route::get( '/me', $giffyApiControllers.'ApiUserController@me' );
		Route::get( '/logout', $giffyApiControllers.'ApiUserController@logout' );
		Route::post( '/login', $giffyApiControllers.'ApiUserController@login' );
		Route::get( '/tags/mine', array(  'uses' => $giffyApiControllers.'ApiTagController@mine' ) );
		Route::post( '/tags/sync', array( 'uses' => $giffyApiControllers.'ApiTagController@sync' ) );
		Route::get( '/gifs/all', array( 'as' =>'gifs.api.all', 'uses' => $giffyApiControllers.'ApiGifController@all' ) );
		Route::get( '/gifs/mine', $giffyApiControllers.'ApiGifController@mine' );
		Route::post( '/gifs/mine/{id}', $giffyApiControllers.'ApiGifController@addToMine' );
		Route::get( '/gifs/{limit?}', $giffyApiControllers.'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}', $giffyApiControllers.'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}/offset/{offset}', $giffyApiControllers.'ApiGifController@fetch' );
		Route::get( '/', function() {
				return View::make( 'api.doc', array( 'route' => 'api.giffy.co/' ) );
			} );
	} );

Route::group( array( 'prefix' => 'gifs' ), function() use ( $giffyControllers ) {
		Route::get( '/', array( 'as'=>'gifs.index', 'uses' => $giffyControllers.'GifController@index' ) );
		Route::post( '/', array( 'uses' => $giffyControllers.'GifController@store' ) );
		Route::get( '/mine', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@mine' ) );
		Route::post( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@addToMine' ) );
		Route::delete( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => $giffyControllers.'GifController@removeFromMine' ) );
		Route::get( '/create', array( 'uses' => $giffyControllers.'GifController@create' ) );
		Route::get( '/seed', array( 'uses' => $giffyControllers.'GifController@seed' ) );
		Route::get( '/tag/{tag}', array( 'uses' => $giffyControllers.'GifController@tagged' ) );
		Route::get( '/{gif_id}', array( 'uses' => $giffyControllers.'GifController@show' ) );
		Route::post( '/{gif_id}/tag', array( 'uses' => $giffyControllers.'GifController@editTag' ) );
		Route::delete( '/{gif_id}/tag', array( 'uses' => $giffyControllers.'GifController@editTag' ) );
	} );

Route::group( array( 'prefix' => 'tags' ), function() use ( $giffyControllers ) {
		Route::post( '/save', array( 'uses' => $giffyControllers.'TagController@save' ) );
		Route::post( '/add', array( 'uses' => $giffyControllers.'TagController@add' ) );
		Route::post( '/remove', array( 'uses' => $giffyControllers.'TagController@remove' ) );
		Route::post( '/sync', array( 'uses' => $giffyControllers.'TagController@sync' ) );
		Route::get( '/mine', array( 'uses' => $giffyControllers.'TagController@mine' ) );
	} );

Route::group( array( 'prefix' => 'user' ), function() use ( $giffyControllers ) {
		Route::get( '/register', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@register' ) );
		Route::post( '/register', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@doRegister' ) );
		Route::get( '/login', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@login' ) );
		Route::get( '/login/twitter', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@loginWithTwitter' ) );
		Route::get( '/login/reddit', array( 'before' => 'guest', 'uses' => $giffyControllers.'UserController@loginWithReddit' ) );
		Route::post( '/login', array( 'uses' => $giffyControllers.'UserController@doLogin' ) );
		Route::get( '/logout', array( 'uses' => $giffyControllers.'UserController@logout' ) );
	} );


Route::get( '/', array( 'uses' => $giffyControllers.'GifController@index' ) );
