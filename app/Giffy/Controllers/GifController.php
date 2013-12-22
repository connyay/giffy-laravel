<?php namespace Giffy\Controllers;

use View, Auth, Input, Redirect, Thumb, Request, Cache, Response;
use Giffy\Repositories\GifRepositoryInterface;
use Giffy\Models\Gif;
use Giffy\Models\Tag;

class GifController extends BaseController {

    /**
     * The gif repository implementation.
     *
     * @var gifs
     */
    protected $gifs;

    /**
     * Create a new Gif controller.
     *
     * @param GifRepositoryInterface $gifs
     *
     * @return GifController
     */
    public function __construct( GifRepositoryInterface $gifs ) {
        $this->gifs = $gifs;
    }

    /**
     * Seed with the top 100 reaction gifs
     *
     * @return Response
     */
    public function seed() {
        $array = (array) json_decode( file_get_contents( "http://www.reddit.com/r/reactiongifs/top/.json?sort=top&t=day&limit=100" ), true );
        $results = array( 'added'=>[], 'skipped'=>[], 'count' => 0 );
        foreach ( $array['data']['children'] as $child ) {
            $data = $child['data'];
            if ( $data['domain'] === 'i.imgur.com' ) {
                $imageUrl = $data['url'];
                $exists = $this->gifs->exists( $imageUrl );
                if ( $exists ) {
                    $results['skipped'][] = $imageUrl;
                    continue;
                }
                $this->gifs->create( $imageUrl );
                $results['added'][] = $imageUrl;
                $results['count']++;
            }
        }
        Cache::tags( 'paginated-gifs' )->flush();
        $this->gifs->cleanDuplicates();
        return Response::json( $results  );
    }

    /**
     * Display a listing of all the gifs.
     *
     * @return Response
     */
    public function index() {
        $gifs = $this->gifs->paginate( 12 );
        // Show the page
        return View::make( 'gifs.index', compact( 'gifs' ) );
    }

    /**
     * Views one Gif
     *
     * @return Response
     */
    public function show( $id ) {
        // Get the gif
        $gif = $this->gifs->find( $id );
        // Show the page
        return View::make( 'gifs.view', compact( 'gif' ) );
    }

    /**
     * Display a listing of the current users gifs.
     *
     * @return Response
     */
    public function mine( $id = null ) {

        if ( isset( $id ) ) {
            if ( !Auth::user()->gifs->contains( $id ) ) {
                Auth::user()->gifs()->attach( $id );
                return Redirect::back()->with( 'success', 'Your Giffy Saved!' );
            }
            return Redirect::back()->with( 'warning', 'You already had that one, man.' );
        }
        // Get all the users gifs
        $gifs = $this->gifs->paginateUserGifs( 12, Auth::user()->id );
        // Show the page
        return View::make( 'gifs.mine', compact( 'gifs' ) );
    }

    /**
     * Display a listing of all the gifs.
     *
     * @return Response
     */
    public function tagged( $tag ) {
        $gifs = $this->gifs->tagged( $tag );
        // Show the page
        return View::make( 'gifs.index', compact( 'gifs' ) );
    }


    public function editTag( $id ) {
        $gif = $this->gifs->find( $id );
        $name = Input::get( 'name' );
        if ( Request::getMethod() == 'DELETE' ) {
            $tag = $gif->userTags()->where( 'tags.name', $name )->first();
            $gif->userTags()->detach( $tag->id );
        }
        if ( Request::getMethod() == 'POST' ) {
            $user_id = Auth::user()->id;
            // TODO: Use tags repo to avoid dups
            $tag = Tag::create( compact( 'name', 'user_id' ) );
            $gif->userTags()->attach( $tag->id );
        }
        return View::make( 'gifs.view', compact( 'gif' ) );
    }

    public function addToMine( $id ) {
        if ( !Auth::user()->gifs->contains( $id ) ) {
            Auth::user()->gifs()->attach( $id );
            return Redirect::back()->with( 'success', 'Your Giffy Saved!' );
        }
        return Redirect::back()->with( 'warning', 'You already had that one, man.' );
    }

    public function removeFromMine( $id ) {
        if ( Auth::user()->gifs->contains( $id ) ) {
            Auth::user()->gifs()->detach( $id );
            return Redirect::back()->with( 'success', 'Your Giffy Removed!' );
        }
        return Redirect::back()->with( 'warning', 'You didn\'t have that one... wat.' );
    }

    /**
     * Create
     *
     * @return Response
     */
    public function create() {
        return View::make( 'gifs.create' );
    }

    /**
     * Create
     *
     * @return Response
     */
    public function store() {
        $imageUrl = Input::get( 'url' );
        $url = parse_url( $imageUrl );

        if ( !isset( $url['host'] ) || !isset( $url["path"] ) ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'What the heck was that?' )->withInput();
        }

        if ( $url["host"] !== "i.imgur.com" ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'How about an i.imgur.com link?' )->withInput();
        }
        $exists = $this->gifs->exists( $imageUrl );
        if ( $exists ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'We already have that gif.' )->withInput();
        }

        if ( $this->gifs->create( $imageUrl ) ) {
            Cache::tags( 'paginated-gifs' )->flush();
            return Redirect::to( 'gifs' )->with( 'success', 'Gif Saved!' );
        } else {
            return Redirect::to( 'gifs/create' )->with( 'error', 'Oops! There was a problem saving the gif.' )->withInput();
        }
    }
}
