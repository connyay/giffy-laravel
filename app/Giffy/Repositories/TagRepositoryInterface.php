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
     * Get a Tag by its name.
     *
     * @param  string $name
     * @return Tag
     */
    public function find( $name );

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
     * Adds a tag to the gif with the provided id.
     *
     * @param  int    $gif_id
     * @param  string $tag
     * @return Tag
     */
    public function add( $gif_id, $tag );

    /**
     * Removes a tag from the gif with the provided id.
     *
     * @param  int    $gif_id
     * @param  string $tag
     * @return Tag
     */
    public function remove( $gif_id, $tag );

    /**
     * Syncs the gif and tag relationships
     *
     * @param  int    $gif_id
     * @param  string $tags
     * @return JSON
     */
    public function syncGifTags( $gif_id, $tags );
}
