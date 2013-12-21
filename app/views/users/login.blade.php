@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'user/login')) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                    </div>
                    {{ Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block')) }}
                </fieldset>
                {{ Form::close() }}
            </div>
        </div>
        <a href="{{ URL::to('user/login/google') }}" class="btn btn-success btn-block">Login With Google</a>
    </div>
</div>

@stop