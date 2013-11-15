<?php namespace Giffy\Models;

class Gif extends BaseModel {

	protected $fillable = array( 'url', 'thumb' );

	public function users() {
		return $this->belongsToMany( 'Giffy\Models\User' );
	}

	public function tags() {
		return $this->belongsToMany( 'Giffy\Models\Tag' )->withPivot('user_id')->withTimestamps();
	}
}
