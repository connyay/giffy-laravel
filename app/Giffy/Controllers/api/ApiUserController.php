<?php

class ApiUserController extends ApiController {

	/**
     * User Model
     * @var user
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getMe()
    {
        if(Auth::guest()) {
            return $this->response("user", array("guest"=>"true"), 401);
        } else {
            $user = Auth::user();
            return $this->response("user", array("id"=>$user->id, "username"=>$user->username), 200);
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return $this->response("message", "logged out successfully", 200);
    }

    public function postLogin()
    {
        $userdata = Input::only('username', 'password');
        if (Auth::attempt($userdata)) {
           $user = Auth::user();
            return $this->response("user", array("id"=>$user->id, "username"=>$user->username), 200);

        } else {        
            return $this->response("message", "failboat", 401);

        }
    }
}