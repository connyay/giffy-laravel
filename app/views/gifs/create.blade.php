@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
New Gif
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">New Gif</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'gifs/create')) }}
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="i.imgur link" name="url" type="text" value="{{ Request::old('url') }}">
                    </div>
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Save">
                </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop