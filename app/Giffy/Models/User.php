<?php namespace Giffy\Models;

use Illuminate\Auth\UserInterface;

class User extends BaseModel implements UserInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array( 'username', 'password', 'twitter_id', 'reddit_id' );
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

	public function gifs() {
		return $this->belongsToMany( 'Giffy\Models\Gif' )->withTimestamps()->orderBy( 'gif_user.id', 'DESC' );
	}

	public function tags() {
		return $this->hasMany( 'Giffy\Models\Tag' );
	}
}
