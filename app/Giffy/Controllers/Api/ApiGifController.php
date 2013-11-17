<?php namespace Giffy\Controllers\Api;

use Auth;
use Giffy\Repositories\GifRepositoryInterface;
use Illuminate\Support\Facades\URL;

class ApiGifController extends ApiController {

    /**
     * The gif repository implementation.
     *
     * @var gifs
     */
    protected $gifs;

    /**
     * Create a new API Gif controller.
     *
     * @param GifRepositoryInterface $gifs
     *
     * @return ApiGifController
     */
    public function __construct( GifRepositoryInterface $gifs ) {
        $this->gifs = $gifs;
    }

    /**
     * Display a listing of all the gifs.
     *
     * @return Response
     */
    public function fetch( $limit = 100, $offset = 0 ) {
        $gifs = $this->gifs->apiFetch( $limit, $offset );
        foreach ( $gifs as $gif ) {
            $gif->thumb = URL::to( $gif->thumb );
        }
        return $this->response( "gifs", $gifs->toArray(), 200, true );
    }

    /**
     * Display a listing of all the gifs for the current user.
     *
     * @return Response
     */
    public function mine() {
        $authorized = $this->authorize();
        if ( !$authorized["is"] ) { return $authorized["message"]; }

        $gifs = Auth::user()->gifs()->get( array( 'gifs.id', 'url', 'thumb' ) );
        foreach ( $gifs as $gif ) {
            $gif->thumb = URL::to( $gif->thumb );
            unset( $gif->pivot );
        }
        return $this->response( "gifs", $gifs->toArray(), 200, true );
    }
}
