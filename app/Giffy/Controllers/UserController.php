<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Validator;
class UserController extends BaseController {

	public function login() {
		return View::make( 'users.login' );
	}

	public function doLogin() {
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required',
			'password' => 'required|min:3' // password has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make( Input::all(), $rules );

		// if the validator fails, redirect back to the form
		if ( $validator->fails() ) {
			return Redirect::to( 'user/login' )
			->withErrors( $validator ) // send back all errors to the login form
			->withInput( Input::except( 'password' ) ); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username'  => Input::get( 'username' ),
				'password'  => Input::get( 'password' )
			);

			// attempt to do the login
			if ( Auth::attempt( $userdata ) ) {
				return Redirect::to( '/' );

			} else {
				// validation not successful, send back to form
				return Redirect::to( 'user/login' )
				->withInput( Input::except( 'password' ) );;

			}

		}
	}

	public function logout() {
		Auth::logout();
		return Redirect::to( '/' );
	}
}
