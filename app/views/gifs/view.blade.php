@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Gif
@stop

{{-- Content --}}
@section('content')

<div class="thumbnail well">
	<img src="{{{URL::to($gif->url)}}}" />
	<div class="caption">

		@if (!Auth::guest()) 
		<p><a href="{{ URL::to('gifs/mine', array('id'=>$gif->id)) }}" {{$gif->users->contains(Auth::user()->id) ? "disabled" : ""}} data-token="{{Session::token()}}" data-method="post" class="btn btn-primary btn-block">Add To My Giffy</a></p>
		@endif

		<input type="text" class="form-control" value="{{{$gif->url}}}">

	</div>
</div>

@stop
