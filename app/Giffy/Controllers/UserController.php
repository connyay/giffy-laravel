<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Validator,
OAuth, Response, Session, Hash, Giffy, Str;
use Giffy\Models\User;

class UserController extends BaseController {

	public function login() {
		return View::make( 'users.login' );
	}

	public function register() {
		return View::make( 'users.register' );
	}

	public function doRegister() {
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required',
			'password'    => 'required|confirmed|min:4',
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make( Input::all(), $rules );

		// if the validator fails, redirect back to the form
		if ( $validator->fails() ) {
			return Redirect::to( 'user/register' )
			->withErrors( $validator ) // send back all errors to the login form
			->withInput( Input::except( 'password' ) ); // send back the input (not the password) so that we can repopulate the form
		} else {

			$user = User::where( 'username', '=', Input::get( 'username' ) )
			->whereNull( 'reddit_id' )->whereNull( 'twitter_id' )->first();

			if ( $user ) {
				return Redirect::to( 'user/register' )
				->withErrors( 'Username exists' ) // send back all errors to the login form
				->withInput( Input::except( 'password' ) );
			}
			// create our user data for the authentication
			$user = User::create( [
				'username' => Str::lower( Input::get( 'username' ) ),
				'password' => Hash::make( Input::get( 'password' ) ),
				] );
			$user->save();
			// login user
			Auth::login( $user );
			// redirect to home page
			return Redirect::route( 'gifs.index' );

		}
	}

	public function doLogin() {
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required',
			'password'    => 'required|min:3' // password has to be greater than 3 characters
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
				'username'  => Str::lower( Input::get( 'username' ) ),
				'password'  => Input::get( 'password' )
			);

			// attempt to do the login
			if ( Giffy::attempt( $userdata ) ) {
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

	public function loginWithTwitter() {

		// get data from input
		$code = Input::get( 'oauth_token' );
		$oauth_verifier = Input::get( 'oauth_verifier' );

		// get twitter service
		$twitterService = OAuth::consumer( 'Twitter' );

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

			$token = $twitterService->getStorage()->retrieveAccessToken( 'Twitter' );

			// This was a callback request from twitter, get the token
			$twitterService->requestAccessToken( $code, $oauth_verifier, $token->getRequestTokenSecret() );

			// Send a request with it
			$result = json_decode( $twitterService->request( 'account/verify_credentials.json' ) );

			// get user by twitter_id
			$user = User::where( 'twitter_id', '=', $result->id )->first();

			// check if user exists
			if ( $user ) {
				// login user
				Auth::login( $user );
				return Redirect::route( 'gifs.index' );
			}
			else {
				// First time twitter login
				// create new user
				$user = User::create( [
					'username' => $result->screen_name,
					'twitter_id' => $result->id,
					] );
				$user->save();
				// login user
				Auth::login( $user );
				return Redirect::route( 'gifs.index' );
			}
		}
		// if not ask for permission first
		else {
			// extra request needed for oauth1 to request a request token :-)
			$token = $twitterService->requestRequestToken();
			$url = $twitterService->getAuthorizationUri( ['oauth_token' => $token->getRequestToken()] );
			// return to twitter login url
			return Redirect::to( (string)$url );
		}
	}

	public function loginWithReddit() {

		// get data from input
		$code = Input::get( 'code' );
		$state = Input::get( 'state' );

		// get google service
		$redditService = OAuth::consumer( 'Reddit' );

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {
			if ( $state !== Session::token() ) {
				// CSRF!
				echo "Uhm... Why did you do that? Knock it off.";
				return;
			}
			// This was a callback request from reddit, get the token
			$token = $redditService->requestAccessToken( $code );

			// Send a request with it
			$result = json_decode( $redditService->request( 'api/v1/me.json' ) );

			$user = User::where( 'reddit_id', '=', $result->id )->first();

			if ( $user ) {
				// login user
				Auth::login( $user );
				return Redirect::route( 'gifs.index' );

			} else {
				// First time reddit login
				// create new user
				$user = User::create( [
					'username' => $result->name,
					'reddit_id' => $result->id,
					] );
				$user->save();

				// login user
				Auth::login( $user );
				return Redirect::route( 'gifs.index' );
			}
		}
		// if not ask for permission first
		else {
			// get redditService authorization
			$url = $redditService->getAuthorizationUri( array( 'state'=>Session::token() ) );
			// return to reddit login url
			return Redirect::to( (string)$url );
		}
	}
}
