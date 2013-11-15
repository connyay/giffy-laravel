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

	/**
	 * Syncs the gif and tag relationships
	 *
	 * @param int  $gif_id
	 * @param string  $tags
	 * @return JSON
	 */
	public function syncGifTags( $gif_id, $tags );
}
