<?php namespace Giffy\Repositories;

use Auth;
use Giffy\Models\Tag;
use Giffy\Models\Gif;

class DbTagRepository implements TagRepositoryInterface {

	/**
	 * Get all of the tags.
	 *
	 * @return array
	 */
	public function all() {
		return Tag::orderBy( 'id', 'DESC' )->get();
	}

	/**
	 * Create a new Tag.
	 *
	 * @param string  $name
	 * @return Tag
	 */
	public function create( $name ) {
		$name = strtolower( $name );
		try {
			return Tag::create( compact( 'name' ) );
		} catch ( \Exception $e ) {
			return Tag::where( "name", "=", $name )->first();
		}
	}

	/**
	 * Syncs the gif and tag relationships
	 *
	 * @param int     $gif_id
	 * @param string  $tags
	 * @return JSON
	 */
	public function syncGifTags( $gif_id, $tags ) {
		// This seems really slow... But Couldn't use detach / sync because of the user_id...
		// *groan*
		$gif = Gif::find( $gif_id );
		foreach ( $gif->userTags as $tag ) {
			$tag->pivot->delete();
		}
		if ( strlen( $tags ) === 0 ) {
			// Empty set. Just deleted all tags.
			return true;
		}
		$tags = explode( ",", $tags );
		$user_id = Auth::user()->id;
		$tagIDs = [];
		foreach ( $tags as $tag ) {
			$newTag = $this->create( $tag );
			$tagIDs[$newTag->id] = array( "user_id"=>$user_id );
		}
		$gif->tags()->attach( $tagIDs );
		return true;
	}
}
