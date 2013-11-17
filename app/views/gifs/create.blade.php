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
                        {{ Form::text('url', Input::old('url'), array('class' => 'form-control', 'placeholder' => 'i.imgur link')) }}
                    </div>
                    {{ Form::submit('Save', array('class' => 'btn btn-lg btn-success btn-block')) }}
                </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop