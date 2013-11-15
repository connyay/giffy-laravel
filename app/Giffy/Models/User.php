<?php namespace Giffy\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password' );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this->email;
	}

	public function gifs() {
		return $this->belongsToMany( 'Giffy\Models\Gif' )->withTimestamps()->orderBy( 'gif_user.id', 'DESC' );
	}

	public function tags() {
		return $this->belongsToMany( 'Giffy\Models\Tag', 'gif_tag' )->withTimestamps()
		->where( 'gif_tag.user_id', $this->id )
		->distinct();
	}
}
