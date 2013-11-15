<?php namespace Giffy\Repositories;

interface TagRepositoryInterface {

	/**
	 * Get all of the tags.
	 *
	 * @return array
	 */
	public function all();

	/**
	 * Create a new Tag.
	 *
	 * @param string  $name
	 * @return Tag
	 */
	public function create( $url );
}
