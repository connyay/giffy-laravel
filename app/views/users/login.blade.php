@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{ Form::open(array('url' => 'user/login', 'class'=>'form-signin mg-btm')) }}
    <h3 class="heading-desc">
      Login to Giffy</h3>
      <div class="social-box">
        <div class="row mg-btm">
         <div class="col-md-12">
          <a href="{{ URL::to('user/login/reddit') }}" class="btn btn-primary btn-block">
            <i class="icon-facebook"></i>    Login with Reddit
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ URL::to('user/login/twitter') }}" class="btn btn-info btn-block" >
            <i class="icon-twitter"></i>    Login with Twitter
          </a>
        </div>
      </div>
    </div>
    <div class="main">
      {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username')) }}
      {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

      <span class="clearfix"></span>
    </div>
    <div class="login-footer">
      <div class="row">
        <div class="col-xs-6 col-md-6">
          <div class="left-section">
            <a href="{{ URL::to('user/register') }}">Register</a>
          </div>
        </div>
        <div class="col-xs-6 col-md-6 pull-right">
         {{ Form::submit('Login', array('class' => 'btn btn-large btn-danger pull-right')) }}
       </div>
     </div>

   </div>
   {{ Form::close() }}
 </div>
</div>

@stop