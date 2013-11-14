<?php namespace Giffy\Repositories;

use Auth;
use Giffy\Models\Gif;

class DbGifRepository implements GifRepositoryInterface {

	/**
	 * Get all of the gifs.
	 *
	 * @return array
	 */
	public function all()
	{
		return Gif::orderBy('id', 'DESC')->get();
	}

	/**
	 * Paginate the gifs.
	 *
	 * @param int $per_page
	 *
	 * @return array
	 */
	public function paginate($per_page)
	{
		$per_page = is_numeric($per_page) ? $per_page : 12;
		return Gif::orderBy('id', 'DESC')->paginate($per_page);
	}

	/**
	 * Paginate the users gifs.
	 *
	 * @param int $per_page
	 * @param int $user_id
	 *
	 * @return array
	 */
	public function paginateUserGifs($per_page, $user_id)
	{
		$per_page = is_numeric($per_page) ? $per_page : 12;

		return Auth::user()->gifs()->paginate($per_page);

	}

	/**
	 * Get a Gif by its id.
	 *
	 * @param  int   $id
	 * @return Gif
	 */
	public function find($id)
	{
		 return Gif::find($id);
	}

	/**
     * Create a new Gif.
     *
     * @param  string  $url
     * @param  string  $thumb
     * @return Post
     */
    public function create($url, $thumb)
    {
            $gif = Gif::create(compact('url', 'thumb'));
            return $gif;
    }
}