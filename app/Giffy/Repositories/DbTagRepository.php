<?php namespace Giffy\Repositories;

use Auth;
use Giffy\Models\Tag;
use Giffy\Models\Gif;

class DbTagRepository implements TagRepositoryInterface
{
    /**
     * Get all of the tags.
     *
     * @return array
     */
    public function all()
    {
        $user_id = Auth::user()->id;

        return Tag::orderBy( 'id', 'DESC' )->get();
    }

    /**
     * Get a Tag by its name.
     *
     * @param  string $name
     * @return Tag
     */
    public function find($name)
    {
        $name = strtolower( $name );
        $user_id = Auth::user()->id;

        return Tag::where( "name", "=", $name )
        ->where( 'user_id', '=', $user_id )->first();

    }

    /**
     * Get all of the users tags.
     *
     * @return array
     */
    public function mine()
    {
        return Auth::user()->tags()->get();
    }

    /**
     * Create a new Tag.
     *
     * @param  string $name
     * @return Tag
     */
    public function create($name)
    {
        $name = strtolower( $name );
        $user_id = Auth::user()->id;
        try {
            return Tag::create( compact( 'name', 'user_id' ) );
        } catch ( \Exception $e ) {
            return Tag::where( "name", "=", $name )
            ->where( 'user_id', '=', $user_id )->first();
        }
    }

    /**
     * Adds a tag to the gif with the provided id.
     *
     * @param  int    $gif_id
     * @param  string $tag
     * @return Tag
     */
    public function add($gif_id, $tag)
    {
        $tag = $this->create( $tag );
        $gif = Gif::find( $gif_id );
        $gif->tags()->attach( $tag->id );

        return $tag;
    }

    /**
     * Removes a tag from the gif with the provided id.
     *
     * @param  int    $gif_id
     * @param  string $tag
     * @return Tag
     */
    public function remove($gif_id, $tag)
    {
        $tag = $this->find( $tag );
        $gif = Gif::find( $gif_id );
        $gif->tags()->detach( $tag->id );

        return $tag;
    }
    /**
     * Syncs the gif and tag relationships
     *
     * @param  int    $gif_id
     * @param  string $tags
     * @return JSON
     */
    public function syncGifTags($gif_id, $tags)
    {
        // This seems really slow... But Couldn't use detach / sync because of the user_id...
        // *groan*
        $gif = Gif::find( $gif_id );
        foreach ( $gif->userTags()->get() as $tag ) {
            $tag->pivot->delete();
        }
        if ( strlen( $tags ) === 0 ) {
            // Empty set. Just deleted all tags.
            return true;
        }
        $tags = explode( ",", $tags );
        $tagIDs = [];
        foreach ($tags as $tag) {
            $newTag = $this->create( $tag );
            $tagIDs[] = $newTag->id;
        }
        $gif->tags()->attach( $tagIDs );

        return true;
    }
}
