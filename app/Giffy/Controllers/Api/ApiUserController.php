<?php namespace Giffy\Controllers\Api;

use Auth, Input;
use Giffy\Models\User;
class ApiUserController extends ApiController {

    /**
     * Returns the info on the currently logged in user.
     *
     * @return Response
     */
    public function me() {
        if ( Auth::guest() ) {
            return $this->response( "user", array( "guest"=>true ), 401 );
        } else {
            $user = Auth::user();
            return $this->response( "user", array( "id"=>$user->id, "username"=>$user->username ), 200 );
        }
    }

    /**
     * Logs out the current user.
     *
     * @return Response
     */
    public function logout() {
        Auth::logout();
        return $this->response( "message", "Logged out successfully", 200 );
    }

    /**
     * Attempts to authenticate with provided information.
     *
     * @return Response
     */
    public function login() {
        $userdata = Input::only( 'username', 'password' );
        if ( Auth::attempt( $userdata ) ) {
            $user = Auth::user();
            return $this->response( "user", array( "id"=>$user->id, "username"=>$user->username ), 200 );
        }
        // That didn't work.
        return $this->response( "message", "Couldn't login with provided credentials. Try again.", 401 );
    }
}
