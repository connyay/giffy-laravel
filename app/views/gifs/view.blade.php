@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Gif
@stop

{{-- Content --}}
@section('content')

<div class="thumbnail well">
    {{ $gif->image }}
    <div class="caption">
        @if ( !Auth::guest() )
        <p>
            {{ $gif->savelink }}
        </p>
        {{ $gif->usertags }}
        @endif
        {{ $gif->imgur }}
    </div>
</div>

@stop

@section('scripts')
<script>
var tagJson,
addTag = function (tag) {
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
removeTag = function (tag) {
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
    create: function (input) {
        return {
            value: input,
            text: input
        }
    },
    preload: true,
    load: function (query, callback) {
        if (tagJson) {
            callback(tagJson);

            return;
        }
        $.ajax({
            url: "{{ URL::to('tags/mine') }}",
            type: 'GET',
            success: function (data) {
                tagJson = $.map( data, function (val) {
                    return {value: val, text: val};
                });
                callback(tagJson);
            }
        });
    },
    onItemAdd: function (tag) {
        console.log("onItemAdd ", tag);
        addTag(tag);
    },
    onItemRemove: function (tag) {
        console.log("onItemRemove ", tag);
        removeTag(tag);
    }
});
</script>
@stop
