<?php namespace Giffy\Models;

class Tag extends BaseModel
{
    protected $fillable = array( 'name', 'user_id' );

    public function gifs()
    {
        return $this->belongsToMany( 'Giffy\Models\Gif' );
    }
}
