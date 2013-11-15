<?php namespace Giffy\Repositories;

use Giffy\Models\Tag;

class DbTagRepository implements TagRepositoryInterface {

	/**
	 * Get all of the tags.
	 *
	 * @return array
	 */
	public function all() {
		return Tag::orderBy( 'id', 'DESC' )->get();
	}

	/**
	 * Create a new Tag.
	 *
	 * @param string  $name
	 * @return Tag
	 */
	public function create( $name ) {
		$name = ucfirst(strtolower($name));
		try {
			return Tag::create( compact( 'name' ) );
		} catch (\Exception $e) {
			return Tag::where("name", "=", $name)->first();
		}
	}
}
