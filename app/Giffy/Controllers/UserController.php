<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Validator, OAuth, Response;
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

	public function loginWithGoogle() {

		// get data from input
		$code = Input::get( 'code' );

		// get google service
		$googleService = OAuth::consumer( 'Google' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

			// This was a callback request from google, get the token
			$token = $googleService->requestAccessToken( $code );

			// Send a request with it
			$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

			$message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
			echo $message. "<br/>";

			//Var_dump
			//display whole array().
			dd( $result );

		}
		// if not ask for permission first
		else {
			// get googleService authorization
			$url = $googleService->getAuthorizationUri();
			//dd( $url );
			// return to facebook login url
			return Redirect::to( (string)$url );
		}
	}
}
