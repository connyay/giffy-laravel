<?php namespace Giffy\Controllers;

use View, Auth, Input, App, Redirect, Thumb;
use Giffy\Repositories\GifRepositoryInterface;
use Giffy\Models\Gif;

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
        $array = (array) json_decode( file_get_contents( "http://www.reddit.com/r/reactiongifs/top/.json?sort=top&t=day&limit=50" ), true );
        $i = 0;
        foreach ( $array["data"]["children"] as $child ) {
            $data = $child["data"];

            if ( $data["domain"] === "i.imgur.com" ) {
                $imageUrl = $data["url"];
                $exists = Gif::where( "url", $imageUrl )->first();
                if ( !is_null( $exists ) ) {
                    echo "\nWe already have " . $imageUrl . " saved.\n";
                    continue;
                }

                $this->gifs->create( $imageUrl );
                $i++;
                echo "\nAdded: " . $imageUrl ."\n";
            }
            sleep( 1 );
        }
        echo "all done? added: " . $i . " images";
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
        $imageUrl = str_replace( ".jpg", ".gif", $imageUrl );
        $url = parse_url( $imageUrl );

        if ( !isset( $url["host"] ) || !isset( $url["path"] ) ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'What the heck was that?' )->withInput();
        }

        if ( $url["host"] !== "i.imgur.com" ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'How about an i.imgur.com link?' )->withInput();
        }

        $exists = Gif::where( "url", "=", $imageUrl )->first();
        if ( !is_null( $exists ) ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'We already have that gif.' )->withInput();
        }

        if ( $this->gifs->create( $imageUrl ) ) {
            return Redirect::to( 'gifs' )->with( 'success', 'Gif Saved!' );
        } else {
            return Redirect::to( 'gifs/create' )->with( 'error', 'Oops! There was a problem saving the gif.' )->withInput();
        }
    }
}
