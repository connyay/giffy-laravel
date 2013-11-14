<?php namespace Giffy\Models;

class Gif extends BaseModel {

	public function users() {
		return $this->belongsToMany( 'Giffy\Models\User' );
	}
}
