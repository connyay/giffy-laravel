@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
All Gifs
@stop

{{-- Content --}}
@section('content')
@include('gifs.tags')
<div class="row">
    @if(sizeof($gifs) > 0)
    @foreach ($gifs as $gif)

    <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 giffy-thumb">
        <div class="thumbnail well">
            <a href="{{ URL::to('gifs', array('id'=>$gif->id)) }}">
                <img class="img" src="{{{URL::to($gif->thumb)}}}" data-thumb-src="{{{URL::to($gif->thumb)}}}" data-full-src="{{{$gif->url}}}" />
            </a>
            <div class="caption">
                <p><a href="{{ URL::to('gifs', array('id'=>$gif->id)) }}" class="btn btn-success btn-block">Open</a></p>
                @if (!Auth::guest())
                <p><a href="{{ URL::to('gifs/mine', array('id'=>$gif->id)) }}" data-token="{{Session::token()}}" data-method="delete" class="btn btn-success btn-block">Remove From My Giffy</a></p>
                @endif
                <input type="text" class="form-control" value="{{{$gif->url}}}">
            </div>
        </div>
    </div>

    @endforeach
    @else

    <div class="col-md-4 col-md-offset-4 well">
        Couldn't find any gifs that belong to you... <br><a href="{{ URL::to('gifs') }}"> Browse some more?</a>
    </div>
    @endif
</div>

<div class="text-center">
    {{ $gifs->links() }}
</div>
@stop
