<?php namespace Giffy\Facades;

use Auth, Hash;
use Giffy\Models\User;

class Giffy {

	public function attempt( $userdata ) {
		$user = User::where( 'username', '=', $userdata['username'] )
		->whereNull( 'reddit_id' )->whereNull( 'twitter_id' )->first();
		if ( $user && Hash::check( $userdata['password'], $user->password ) ) {
			Auth::login( $user );
			return true;
		}
		return false;
	}

}
