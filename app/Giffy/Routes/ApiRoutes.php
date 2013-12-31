<?php

$apiDomain = Config::get( 'app.api_domain' );

Route::group( array( 'domain' => $apiDomain, 'namespace' => 'Giffy\Controllers\Api' ), function () {
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
        Route::get( '/', function () {
                return View::make( 'api.doc', array( 'route' => 'api.giffy.co/' ) );
            } );
    } );
