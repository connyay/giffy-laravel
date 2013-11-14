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
     * Inject the models.
     *
     * @param Confession $confession
     */
    public function __construct( GifRepositoryInterface $gifs ) {
        $this->gifs = $gifs;
    }

    /**
     * Seed with the top 100 reaction gifs
     *
     * @return Response
     */
    public function getSeed() {
        $array = (array) json_decode( file_get_contents( "http://www.reddit.com/r/reactiongifs/top/.json?sort=top&t=day&limit=100" ), true );
        $i = 0;
        foreach ( $array["data"]["children"] as $child ) {
            $data = $child["data"];

            if ( $data["domain"] === "i.imgur.com" ) {
                $imageUrl = $data["url"];
                $exists = Gif::where( "url", "=", $imageUrl )->first();
                if ( isset( $exists ) ) {
                    echo "\nWe already have " . $imageUrl . " saved.\n";
                    continue;
                }
                $url = parse_url( $imageUrl );
                $storagePath = public_path() . "/thumbs/";
                $thumbPath = '/thumbs' . $url["path"];

                Thumb::create( $imageUrl )->make( 'resize', array( 150, 150, 'adaptive' ) )->save( $storagePath );
                $this->gifs->create( $imageUrl, $thumbPath );
                $i++;
                echo "\nAdded: " . $imageUrl ."\n";
            }
            sleep( 2 );
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
        return View::make( 'gifs.index', compact( 'gifs', 'userGifs' ) );
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
        if ( Auth::guest() ) {
            return Redirect::to( 'login' )->with( 'error', 'Oops! You have to login to do that' );
        }

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
        // Show the register form
        return View::make( 'gifs.create' );
    }
    /**
     * Create
     *
     * @return Response
     */
    public function save() {
        $imageUrl = Input::get( 'url' );
        $imageUrl = str_replace( ".jpg", ".gif", $imageUrl );
        $url = parse_url( $imageUrl );

        if ( $url["host"] !== "i.imgur.com" ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'How about an i.imgur.com link?' );
        }

        $exists = Gif::where( "url", "=", $imageUrl )->first();
        if ( isset( $exists ) ) {
            return Redirect::to( 'gifs/create' )->with( 'error', 'We already have that gif.' );
        }

        $fileName = $url["path"];
        $storagePath = public_path() . "/thumbs/";
        $thumbPath = '/thumbs' . $fileName;

        Thumb::create( $imageUrl )->make( 'resize', array( 150, 150, 'adaptive' ) )->save( $storagePath );
        $gif = new Gif;
        $gif->url = $imageUrl;
        $gif->thumb = $thumbPath;
        if ( $gif->save() ) {
            // Redirect to this confession page
            return Redirect::to( 'gifs' )->with( 'success', 'Gif Saved!' );
        } else {
            return Redirect::to( 'gifs/create' )->with( 'error', 'Oops! There was a problem saving the gif.' );
        }
    }
}