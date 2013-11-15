<?php namespace Giffy\Controllers;

use Giffy\Repositories\TagRepositoryInterface;

class TagController extends BaseController {

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
    public function __construct( TagRepositoryInterface $tags ) {
        $this->tags = $tags;
    }

    public function save() {
        $tagName = Input::get( 'name' );
        $this->tags->create( $tagName );
    }

}
