@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
All Gifs
@stop

{{-- Content --}}
@section('content')
@if (!Auth::guest()) 
@include('gifs.tags')
@endif
<div id="images" class="row">
		@foreach ($gifs as $gif)

		<div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 giffy-thumb">
			<div class="thumbnail well">
				<a href="{{ URL::to('gifs', array('id'=>$gif->id)) }}">
					<img class="img" src="{{{URL::to($gif->thumb)}}}" data-thumb-src="{{{URL::to($gif->thumb)}}}" data-full-src="{{{$gif->url}}}" />
				</a>
				<div class="caption">
					<p><a href="{{ URL::to('gifs', array('id'=>$gif->id)) }}" class="btn btn-primary btn-block">Open</a></p>
					@if (!Auth::guest()) 
					<p><a href="{{ URL::to('gifs/mine', array('id'=>$gif->id)) }}" {{$gif->users->contains(Auth::user()->id) ? "disabled" : ""}}  data-token="{{Session::token()}}" data-method="post" class="btn btn-primary btn-block">Add To My Giffy</a></p>
					@endif


					<input type="text" class="form-control" value="{{{$gif->url}}}">
					
				</div>
			</div>
		</div>


		@endforeach
	
</div>

<div class="text-center">
	{{ $gifs->links() }}
</div>
@stop
