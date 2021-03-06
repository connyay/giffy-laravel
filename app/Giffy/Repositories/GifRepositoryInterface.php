<?php namespace Giffy\Repositories;

interface GifRepositoryInterface
{
    /**
     * Get all of the gifs.
     *
     * @return array
     */
    public function all();

    /**
     * Paginate the gifs.
     *
     * @param int $per_page
     *
     * @return array
     */
    public function paginate( $per_page );

    /**
     * Paginate the users gifs.
     *
     * @param int $per_page
     * @param int $user_id
     *
     * @return array
     */
    public function paginateUserGifs( $per_page, $user_id );

    /**
     * Get a Gif by its id.
     *
     * @param  int $id
     * @return Gif
     */
    public function find( $id );

    /**
     * Get Gifs that match provided tag
     *
     * @param  String $tag
     * @return array
     */
    public function tagged( $tag );

    /**
     * Create a new Gif.
     *
     * @param  string $url
     * @return Gif
     */
    public function create( $url );

    /**
     * Returns gifs for API.
     *
     * @param  string $limit
     * @param  string $offset
     * @return Gifs
     */
    public function apiFetch( $limit, $offset );

    /**
     * Checks existance of gif
     *
     * @param  string $url
     * @return bool
     */
    public function exists( $url );

    /**
     * Cleans duplicate gifs from database
     */
    public function cleanDuplicates( );
}
