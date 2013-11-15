<?php namespace Giffy\Controllers\Api;

use Auth;
use Giffy\Repositories\TagRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

class ApiTagController extends ApiController {

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
    public function __construct( TagRepositoryInterface $tags ) {
        $this->tags = $tags;
    }

    /**
     * Display a listing of all the tags.
     *
     * @return Response
     */
    public function all( ) {
        $tags = $this->tags->all( );
        return Response::json( $tags->lists("name") );
    }
}
