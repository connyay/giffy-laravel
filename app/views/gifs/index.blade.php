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
    @if($gif = $gif->getPresenter()) @endif
    <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 giffy-thumb">
        <div class="thumbnail well">
                {{ $gif->thumbnaillink }}
            <div class="caption">
                <p>
                    {{ $gif->openlink }}
                </p>
                @if (!Auth::guest())
                <p>
                    {{ $gif->savelink }}
                </p>
                @endif
                {{ $gif->imgur }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center">
    {{ $gifs->links() }}
</div>
@stop
