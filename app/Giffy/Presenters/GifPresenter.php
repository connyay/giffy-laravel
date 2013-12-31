<?php namespace Giffy\Presenters;

use HTML, URL, Form, Session, Auth;

class GifPresenter extends \Robbo\Presenter\Presenter
{
    public function presentImage()
    {
        return HTML::image( $this->url, 'Gif on Giffy', array( 'class'=>'img' ) );
    }

    public function presentThumbnail()
    {
        return HTML::image( $this->thumb, 'Gif on Giffy', array( 'class'=>'img' ) );
    }

    public function presentThumbnailLink()
    {
        $thumbnail = $this->presentThumbnail();
        $url = URL::to( 'gifs', array( 'id'=>$this->id ) );

        return '<a href="' . $url . '">' . $thumbnail . '</a>';
    }

    public function presentImgur()
    {
        return Form::text( null, $this->url, array( 'class' => 'form-control' ) );
    }

    public function presentUserTags()
    {
        $tags = implode( ',', $this->userTags()->lists( "name" ) );

        return Form::text( null, $tags, array( 'class' => 'form-control tags', 'placeholder'=>'Enter Gif Tags' ) );
    }

    public function presentSaveLink()
    {
        $url = URL::to( 'gifs/mine', array( 'id'=>$this->id ) );
        $attributes = array(
            'data-method' => 'post',
            'data-token' => Session::token(),
            'class' => 'btn btn-success btn-block',
        );
        if ( $this->users->contains( Auth::user()->id ) ) {
            $attributes['disabled'] = '';
        }

        return HTML::link( $url, 'Add To My Giffy', $attributes );
    }

    public function presentRemoveLink()
    {
        $url = URL::to( 'gifs/mine', array( 'id'=>$this->id ) );
        $attributes = array(
            'data-method' => 'delete',
            'data-token' => Session::token(),
            'class' => 'btn btn-success btn-block',
        );

        return HTML::link( $url, 'Remove From My Giffy', $attributes );
    }

    public function presentOpenLink()
    {
        $url = URL::to( 'gifs', array( 'id'=>$this->id ) );
        $attributes = array(
            'class' => 'btn btn-success btn-block',
        );

        return HTML::link( $url, 'Open', $attributes );
    }
}
