<?php namespace Giffy\Repositories;

use Auth, URL, Thumb, DB;
use Giffy\Models\Gif;
use Giffy\Models\Tag;

class DbGifRepository implements GifRepositoryInterface
{
    /**
     * Get all of the gifs.
     *
     * @return array
     */
    public function all()
    {
        return Gif::orderBy( 'id', 'DESC' )->get();
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
        $per_page = is_numeric( $per_page ) ? $per_page : 12;
        $query = Gif::rememberForever()->cacheTags( 'paginated-gifs' )->orderBy( 'id', 'DESC' );
        // Eager load user relationship if user is logged in.
        if ( Auth::check() ) {
            $query->with( 'users' );
        }

        return  $query->paginate( $per_page );
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
        $per_page = is_numeric( $per_page ) ? $per_page : 12;

        return Auth::user()->gifs()->paginate( $per_page );
    }

    /**
     * Get a Gif by its id.
     *
     * @param  int $id
     * @return Gif
     */
    public function find($id)
    {
        return Gif::rememberForever( 'gif-'.$id )->find( $id );
    }

    /**
     * Get Gifs that match provided tag
     *
     * @param  String $tag
     * @return array
     */
    public function tagged($tag)
    {
        $tag = Tag::where( "name", $tag )->first();

        return $tag->gifs()->paginate( 12 );
    }

    /**
     * Create a new Gif.
     *
     * @param  string $url
     * @return Post
     */
    public function create($url)
    {
        $this->cleanURL( $url );
        $thumb = $this->buildThumb( $url );

        return Gif::create( compact( 'url', 'thumb' ) );
    }

    /**
     * Returns gifs for API.
     *
     * @param  string $limit
     * @param  string $offset
     * @return Gifs
     */
    public function apiFetch($limit, $offset)
    {
        return Gif::select( 'id', 'url', 'thumb' )
        ->orderBy( 'id', 'DESC' )
        ->skip( $offset )->take( $limit )
        ->get();
    }

    /**
     * Checks existance of gif
     *
     * @param  string $url
     * @return bool
     */
    public function exists($url)
    {
        $this->cleanURL( $url );
        $exists = Gif::where( "url", "=", $url )->first();

        return ( is_null( $exists ) ) ? false : true;
    }

    /**
     * Cleans duplicate entries from the gif table
     */
    public function cleanDuplicates()
    {
        DB::delete( DB::raw( 'DELETE g1 FROM gifs g1, gifs g2 WHERE g1.id > g2.id AND g1.url = g2.url' ) );
    }

    /**
     * Builds thumbnail from url
     *
     * @param  string $url
     * @return string
     */
    private function buildThumb($url)
    {
        $parsedURL = parse_url( $url );
        $fileName = $parsedURL["path"];
        $thumbPath = '/thumbs' . $fileName;
        Thumb::create( $url )->make( 'resize', array( 150, 150, 'adaptive' ) )->save( public_path() . "/thumbs/" );

        return $thumbPath;
    }

    private function cleanURL(&$url)
    {
        $url = str_replace( ".jpg", ".gif", $url );
        $url = str_replace( "https:", "http:", $url );
        $url = explode( "?", $url );
        $url = $url[0];
        $url = str_finish( $url, '.gif' );
    }
}
