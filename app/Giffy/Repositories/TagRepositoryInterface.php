<?php namespace Giffy\Repositories;

interface TagRepositoryInterface
{
    /**
     * Get all of the tags.
     *
     * @return array
     */
    public function all();

    /**
     * Get all of the users tags.
     *
     * @return array
     */
    public function mine();

    /**
     * Create a new Tag.
     *
     * @param  string $name
     * @return Tag
     */
    public function create( $name );

    /**
     * Syncs the gif and tag relationships
     *
     * @param  int    $gif_id
     * @param  string $tags
     * @return JSON
     */
    public function syncGifTags( $gif_id, $tags );

    public function add( $gif_id, $tag );

    public function remove( $gif_id, $tag );

    public function find( $name );
}
