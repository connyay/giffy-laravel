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
		<input type="text" class="form-control tags" data-role="tagsinput" placeholder="Enter Gif Tags">
		<a href="{{ URL::to('tags/save', array('id'=>$gif->id)) }}"data-token="{{Session::token()}}" data-method="post" class="col-lg-1">Save</a>
		@endif

		<input type="text" class="form-control" value="{{{$gif->url}}}">

	</div>
</div>

@stop

@section('scripts')
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
<script>
$('.tags').tagsinput({
  typeahead: {
    source: function(query) {
      return $.getJSON("{{ URL::to('api/tags/all') }}");
    }
  }
});
</script>
@stop