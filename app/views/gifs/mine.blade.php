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
<div class="row">
@if(sizeof($gifs) > 0)
		@foreach ($gifs as $gif)

		<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			<div class="thumbnail well">
				<img class="giffy-thumb" src="{{{URL::to($gif->thumb)}}}" data-thumb-src="{{{URL::to($gif->thumb)}}}" data-full-src="{{{$gif->url}}}" />
				<div class="caption">
				
					<p><a href="{{ URL::to('gifs/show', array('id'=>$gif->id)) }}" class="btn btn-primary btn-block">Open</a></p>
					@if (!Auth::guest()) 
					<p><a href="{{ URL::to('gifs/mine', array('id'=>$gif->id)) }}" data-token="{{Session::token()}}" data-method="delete" class="btn btn-primary btn-block">Remove From My Giffy</a></p>
					@endif
					<input type="text" class="form-control" value="{{{$gif->url}}}">
					
				</div>
			</div>
		</div>


		@endforeach
@else
Couldn't find any gifs that belong to you... <a href="{{ URL::to('gifs') }}"> Browse some more?</a>
@endif
</div>

<div class="text-center">
	{{ $gifs->links() }}
</div>
@stop
