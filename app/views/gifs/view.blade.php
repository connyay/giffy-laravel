@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Gif
@stop

{{-- Content --}}
@section('content')

<div class="thumbnail well">
	<img class="img" src="{{{URL::to($gif->url)}}}" />
	<div class="caption">

		@if (!Auth::guest()) 
		<p><a href="{{ URL::to('gifs/mine', array('id'=>$gif->id)) }}" {{$gif->users->contains(Auth::user()->id) ? "disabled" : ""}} data-token="{{Session::token()}}" data-method="post" class="btn btn-success btn-block">Add To My Giffy</a></p>
		<input type="text" class="form-control tags" data-role="tagsinput" placeholder="Enter Gif Tags" value="{{ implode(',', $gif->userTags()->lists("name")) }}">
		@endif
		<input type="text" class="form-control" value="{{{$gif->url}}}">

	</div>
</div>

@stop

@section('scripts')
<script>
var tagJson,
	addTag = function(tag){
		var data = {
			"gif_id": "{{ $gif->id }}",
			"tag": tag
		};
		$.ajax({
			url: "{{ URL::to('tags/add') }}",
			type: "POST",
			data: data,
			success: function (data, textStatus, jqXHR) {
				console.log("good: ", data);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("bad: ", jqXHR);
			}
		});
	},
	removeTag = function(tag){
		var data = {
			"gif_id": "{{ $gif->id }}",
			"tag": tag
		};
		$.ajax({
			url: "{{ URL::to('tags/remove') }}",
			type: "POST",
			data: data,
			success: function (data, textStatus, jqXHR) {
				console.log("good: ", data);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("bad: ", jqXHR);
			}
		});
	};

$('.tags').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    },
    preload: true,
    load: function(query, callback) {
    	if(tagJson) {
    		callback(tagJson);
    		return;
    	}
        $.ajax({
            url: "{{ URL::to('tags/mine') }}",
            type: 'GET',
            success: function(data) {
            	tagJson = $.map( data, function( val ) {
				  return {value: val, text: val};
				});
                callback(tagJson);
            }
        });
	},
	onItemAdd: function(tag) {
		console.log("onItemAdd ", tag);
		addTag(tag);
	},
	onItemRemove: function(tag) {
		console.log("onItemRemove ", tag);
		removeTag(tag);
	}
});

// $tags.tagsinput({
// 	typeahead: {
// 		source: function (query) {
// 			if (!tagJson) {
// 				tagJson = $.getJSON("{{ URL::to('tags/mine') }}");
// 			}
// 			return tagJson;
// 		}
// 	}
// });
// var initCount = $tags.tagsinput('items').length,
// 	currentCount = initCount,
// 	lastCount,
// 	saveTags = function () {
// 		var data = {
// 			"gif_id": "{{ $gif->id }}",
// 			"tags": $tags.val()
// 		};
// 		$.ajax({
// 			url: "{{ URL::to('tags/sync') }}",
// 			type: "POST",
// 			data: data,
// 			success: function (data, textStatus, jqXHR) {
// 				console.log("good: ", data);
// 			},
// 			error: function (jqXHR, textStatus, errorThrown) {
// 				console.log("bad: ", jqXHR);
// 			}
// 		});
// 	};
// $tags.tagsinput('input').keyup(function (e) {
// 	if (e.keyCode == 13) {
// 		lastCount = currentCount;
// 		currentCount = $tags.tagsinput('items').length;
// 		if (lastCount === currentCount) {
// 			saveTags();
// 		}
// 	}
// 	if (e.keyCode == 8 || e.keyCode == 46) {
// 		currentCount = $tags.tagsinput('items').length;
// 	}
// });
</script>
@stop
