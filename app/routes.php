<?php
$apiDomain = Config::get( 'app.api_url' );

Route::group( array( 'domain' => $apiDomain, 'namespace' => 'Giffy\Controllers\Api' ), function() {
		Route::get( '/me', 'ApiUserController@me' );
		Route::get( '/logout', 'ApiUserController@logout' );
		Route::post( '/login', 'ApiUserController@login' );
		Route::get( '/tags/mine', array(  'uses' => 'ApiTagController@mine' ) );
		Route::post( '/tags/sync', array( 'uses' => 'ApiTagController@sync' ) );
		Route::get( '/gifs/all', array( 'as' =>'gifs.api.all', 'uses' => 'ApiGifController@all' ) );
		Route::get( '/gifs/mine', 'ApiGifController@mine' );
		Route::post( '/gifs/mine/{id}', 'ApiGifController@addToMine' );
		Route::get( '/gifs/{limit?}', 'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}', 'ApiGifController@fetch' );
		Route::get( '/gifs/limit/{limit}/offset/{offset}', 'ApiGifController@fetch' );
		Route::get( '/', function() {
				return View::make( 'api.doc', array( 'route' => 'api.giffy.co/' ) );
			} );
	} );

Route::group( array( 'prefix' => 'gifs', 'namespace' => 'Giffy\Controllers' ), function() {
		Route::get( '/', array( 'as'=>'gifs.index', 'uses' => 'GifController@index' ) );
		Route::post( '/', array( 'uses' => 'GifController@store' ) );
		Route::get( '/mine', array( 'before' => 'auth', 'uses' => 'GifController@mine' ) );
		Route::post( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => 'GifController@addToMine' ) );
		Route::delete( '/mine/{gif_id}', array( 'before' => 'auth', 'uses' => 'GifController@removeFromMine' ) );
		Route::get( '/create', array( 'uses' => 'GifController@create' ) );
		Route::get( '/seed', array( 'uses' => 'GifController@seed' ) );
		Route::get( '/tag/{tag}', array( 'uses' => 'GifController@tagged' ) );
		Route::get( '/{gif_id}', array( 'uses' => 'GifController@show' ) );
		Route::post( '/{gif_id}/tag', array( 'uses' => 'GifController@editTag' ) );
		Route::delete( '/{gif_id}/tag', array( 'uses' => 'GifController@editTag' ) );
	} );

Route::group( array( 'prefix' => 'tags', 'namespace' => 'Giffy\Controllers' ), function() {
		Route::post( '/save', array( 'uses' => 'TagController@save' ) );
		Route::post( '/add', array( 'uses' => 'TagController@add' ) );
		Route::post( '/remove', array( 'uses' => 'TagController@remove' ) );
		Route::post( '/sync', array( 'uses' => 'TagController@sync' ) );
		Route::get( '/mine', array( 'uses' => 'TagController@mine' ) );
	} );

Route::group( array( 'prefix' => 'user', 'namespace' => 'Giffy\Controllers' ), function() {
		Route::get( '/register', array( 'before' => 'guest', 'uses' => 'UserController@register' ) );
		Route::post( '/register', array( 'before' => 'guest', 'uses' => 'UserController@doRegister' ) );
		Route::get( '/login', array( 'before' => 'guest', 'uses' => 'UserController@login' ) );
		Route::get( '/login/twitter', array( 'before' => 'guest', 'uses' => 'UserController@loginWithTwitter' ) );
		Route::get( '/login/reddit', array( 'before' => 'guest', 'uses' => 'UserController@loginWithReddit' ) );
		Route::post( '/login', array( 'uses' => 'UserController@doLogin' ) );
		Route::get( '/logout', array( 'uses' => 'UserController@logout' ) );
	} );


Route::get( '/', array( 'uses' => 'Giffy\Controllers\GifController@index' ) );
