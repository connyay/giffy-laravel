<?php namespace Giffy\Facades;

use Auth, Hash;
use Giffy\Models\User;

class Giffy
{
    public function attempt($userdata, $remember = false)
    {
        if ( !is_bool( $remember ) ) {
            // Make sure nothing weird was passed for remember
            $remember = false;
        }
        $user = User::where( 'username', '=', $userdata['username'] )
        ->whereNull( 'reddit_id' )->whereNull( 'twitter_id' )->first();
        if ( $user && Hash::check( $userdata['password'], $user->password ) ) {
            Auth::login( $user, $remember );

            return true;
        }

        return false;
    }

}
