<?php namespace Giffy\Controllers\Api;

use Auth, Input;
use Giffy\Repositories\TagRepositoryInterface;
use Illuminate\Support\Facades\Response;

class ApiTagController extends ApiController
{
    /**
     * The tag repository implementation.
     *
     * @var tags
     */
    protected $tags;

    /**
     * Create a new API Tag controller.
     *
     * @param TagRepositoryInterface $tags
     *
     * @return ApiTagController
     */
    public function __construct(TagRepositoryInterface $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Display a listing of all the tags.
     *
     * @return Response
     */
    public function all()
    {
        $tags = $this->tags->all( );

        return Response::json( $tags->lists( 'name' ) );
    }

    /**
     * Display a listing of all the user tags.
     *
     * @return Response
     */
    public function mine()
    {
        $authorized = $this->authorize();
        if (!$authorized['is']) { return $authorized['message']; }

        $tags = $this->tags->mine( );

        return Response::json( $tags->lists( 'name' ) );
    }

    /**
     * Syncs the gif tags.
     *
     * @return Response
     */
    public function sync()
    {
        $authorized = $this->authorize();
        if (!$authorized['is']) { return $authorized['message']; }

        $gif_id = Input::get( 'gif_id' );
        $tags = Input::get( 'tags' );
        $message = 'Failed Sync';
        $status = 500;
        if ( $this->tags->syncGifTags( $gif_id, $tags ) ) {
            $message = 'Successful Sync';
            $status = 200;
        }

        return $this->response( 'message', $message, $status );
    }
}
