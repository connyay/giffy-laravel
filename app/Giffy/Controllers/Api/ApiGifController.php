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
        return $this->response( 'gifs', $gifs->toArray(), 200, true );
    }

    /**
     * Display a listing of all the gifs for the current user.
     *
     * @return Response
     */
    public function mine() {
        $authorized = $this->authorize();
        if ( !$authorized['is'] ) { return $authorized['message']; }

        $gifs = Auth::user()->gifs()->get( array( 'gifs.id', 'url', 'thumb' ) );
        foreach ( $gifs as $gif ) {
            $gif->thumb = URL::to( $gif->thumb );
            unset( $gif->pivot );
        }
        return $this->response( 'gifs', $gifs->toArray(), 200, true );
    }

    /**
     * Display a listing of all the gifs with pages.
     *
     * @return Response
     */
    public function all() {
        $gifs = $this->gifs->paginate( 12 );
        $last = $gifs->getLastPage();
        $current = $gifs->getCurrentPage();
        $total = $gifs->getTotal();
        $gifs = $gifs->getCollection()->toArray();

        foreach ( $gifs as &$gif ) {
            unset( $gif['created_at'], $gif['updated_at'] );
            $gif['thumb'] = URL::to( $gif['thumb'] );
        }
        $results = [];
        $results['total'] = $total;
        $results['gifs'] = $gifs;
        $results['prev_page'] = '';
        $results['next_page'] = '';

        if ( $current != 1 ) {
            $results['prev_page'] = route( 'gifs.api.all', array( 'page'=>$current - 1 ) );
        }

        if ( $current != $last ) {
            $results['next_page'] = route( 'gifs.api.all', array( 'page'=>$current + 1 ) );
        }

        return $this->response( '', $results, 200 );
    }

    /**
     * Add a gif to logged in users account
     *
     * @return Response
     */
    public function addToMine( $id ) {
        $authorized = $this->authorize();
        if ( !$authorized['is'] ) { return $authorized['message']; }

        if ( !Auth::user()->gifs->contains( $id ) ) {
            Auth::user()->gifs()->attach( $id );
            return $this->response( 'message', 'Gif saved successfully!', 200 );
        }
        return $this->response( 'message', 'Gif already saved.', 302 );
    }
}
