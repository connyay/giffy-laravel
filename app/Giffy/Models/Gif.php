<?php namespace Giffy\Models;
use Auth;
use Giffy\Presenters\GifPresenter;

class Gif extends BaseModel
{
    protected $fillable = array( 'url', 'thumb' );

    public function users()
    {
        return $this->belongsToMany( 'Giffy\Models\User' );
    }

    public function tags()
    {
        return $this->belongsToMany( 'Giffy\Models\Tag' )->withTimestamps();
    }

    public function userTags()
    {
        return $this->tags()->where( 'tags.user_id', Auth::user()->id );
    }

    public function getPresenter()
    {
        return new GifPresenter($this);
    }
}
