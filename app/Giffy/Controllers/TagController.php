<?php namespace Giffy\Controllers;

use Input, Cache;
use Illuminate\Support\Facades\Response;
use Giffy\Repositories\TagRepositoryInterface;

class TagController extends BaseController
{
    /**
     * The tag repository implementation.
     *
     * @var tags
     */
    protected $tags;

    /**
     * Create a new Tag controller.
     *
     * @param TagRepositoryInterface $tags
     *
     * @return TagController
     */
    public function __construct(TagRepositoryInterface $tags)
    {
        $this->tags = $tags;
    }

    public function save()
    {
        $tagName = Input::get( 'name' );
        $this->tags->create( $tagName );
    }

    public function mine()
    {
        $tags = $this->tags->mine( );

        return Response::json( $tags->lists( "name" ) );
    }

    public function add()
    {
        $gif_id = Input::get( "gif_id" );
        $tag = Input::get( "tag" );
        $this->tags->add( $gif_id, $tag );
        Cache::tags( 'tags' )->flush();

        return Response::json( "Added " . $tag );
    }

    public function remove()
    {
        $gif_id = Input::get( "gif_id" );
        $tag = Input::get( "tag" );
        $this->tags->remove( $gif_id, $tag );
        Cache::tags( 'tags' )->flush();

        return Response::json( "Removed " . $tag );
    }

    public function sync()
    {
        $gif_id = Input::get( "gif_id" );
        $tags = Input::get( "tags" );
        $this->tags->syncGifTags( $gif_id, $tags );

        return Response::json( "Successful Sync" );
    }
}
