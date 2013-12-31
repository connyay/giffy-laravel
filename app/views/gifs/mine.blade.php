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
                    {{ $gif->removelink }}
                </p>
                @endif
                {{ $gif->imgur }}
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
