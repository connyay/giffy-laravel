<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Validator, 
	OAuth, Response, Session;
use Giffy\Models\User;
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
			// return to google login url
			return Redirect::to( (string)$url );
		}
	}

	public function loginWithTwitter() {

		// get data from input
		$code = Input::get( 'oauth_token' );
		$oauth_verifier = Input::get( 'oauth_verifier' );

		// get fb service
		$twitterService = OAuth::consumer( 'Twitter' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

			$token = $twitterService->getStorage()->retrieveAccessToken( 'Twitter' );

			// This was a callback request from google, get the token
			$twitterService->requestAccessToken( $code, $oauth_verifier, $token->getRequestTokenSecret() );

			// Send a request with it
			$result = json_decode( $twitterService->request( 'account/verify_credentials.json' ) );

			// try to login

			// get user by twitter_id
			$user = User::where( 'twitter_id', '=', $result->id )->first();

			// check if user exists
			if ( $user ) {
				// login user
				Auth::login( $user );

				// build message with some of the resultant data
				$message = 'Your unique twitter user id is: ' . $result->id . ' and your name is ' . $result->name;

				// redirect to user profile
				return Redirect::route( 'gifs.index' )
				->with( 'success', $message );

			}
			else {
				// FIRST TIME TWITTER LOGIN

				// create new user
				$user = User::create( [
					'username' => $result->screen_name,
					'twitter_id' => $result->id,
					] );
				$user->save();

				// login user
				Auth::login( $user );

				// build message with some of the resultant data
				$message_success = 'Your unique twitter user id is: ' . $result->id . ' and your name is ' . $result->name;
				$message_notice = 'Account Created.';

				// redirect to game page
				return Redirect::route( 'gifs.index' )
				->with( 'success', $message_success )
				->with( 'info', $message_notice );

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

		// get google service
		$redditService = OAuth::consumer( 'Reddit' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {
			// This was a callback request from google, get the token
			$token = $redditService->requestAccessToken( $code );

			// Send a request with it
			$result = json_decode( $redditService->request( 'https://oauth.reddit.com/api/v1/me.json' ), true );

			$user = User::where( 'reddit_id', '=', $result->id )->first();

			if ( $user ) {
				// login user
				Auth::login( $user );

				// build message with some of the resultant data
				$message = 'Your unique reddit user id is: ' . $result->id . ' and your name is ' . $result->name;

				// redirect to user profile
				return Redirect::route( 'gifs.index' )
				->with( 'success', $message );

			} else {
				// FIRST TIME Reddit LOGIN

				// create new user
				$user = User::create( [
					'username' => $result->name,
					'reddit_id' => $result->id,
					] );
				$user->save();

				// login user
				Auth::login( $user );

				// build message with some of the resultant data
				$message = 'Your unique reddit user id is: ' . $result->id . ' and your name is ' . $result->name;
				$message_notice = 'Account Created.';

				// redirect to game page
				return Redirect::route( 'gifs.index' )
				->with( 'success', $message_success )
				->with( 'success', $message_notice );

			}
			//Var_dump
			//display whole array().
			dd( $result );

		}
		// if not ask for permission first
		else {
			// get redditService authorization
			$url = $redditService->getAuthorizationUri(array('state'=>Session::token()));
			//dd( $url );
			// return to facebook login url
			return Redirect::to( (string)$url );
		}
	}
}
