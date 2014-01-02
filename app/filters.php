<?php

App::before( function ($request) {
        //
} );

App::after( function ($request, $response) {
        //
} );

Route::filter( 'auth', function () {
    if ( !Auth::check() ) {
        return Redirect::to( 'user/login' )->with( 'error', 'Oops! You have to login to do that' );
    }
} );

Route::filter( 'admin', function () {
    if ( !Auth::check() ) {
        return Redirect::to( 'user/login' )->with( 'error', 'Oops! You have to login to do that' );
    }
    if ( !Auth::user()->isAdmin() ) {
        return Redirect::to( '/' )->with( 'error', 'Oops! You don\'t have permission to do that' );
    }
} );

Route::filter( 'guest', function () {
    if ( Auth::check() ) {
        return Redirect::to( '/' );
    }
} );

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter( 'csrf', function () {
    if ( Session::token() != Input::get( '_token' ) ) {
        throw new Illuminate\Session\TokenMismatchException;
    }
} );
