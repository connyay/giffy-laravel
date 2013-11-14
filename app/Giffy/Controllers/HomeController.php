<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Validator;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin()
	{
		// show the form
		return View::make('users.login');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required',
			'password' => 'required|min:3' // password has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {
				return Redirect::to('/');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login');

			}

		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}