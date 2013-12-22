@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Register
@stop

{{-- Content --}}
@section('content')

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{ Form::open(array('url' => 'user/register', 'class'=>'form-signin mg-btm')) }}
    <h3 class="heading-desc">
      Sign Up</h3>
      <div class="main">
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username')) }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password (again)')) }}

        <span class="clearfix"></span>
      </div>
      <div class="login-footer">
        <div class="row">
          <div class="col-xs-6 col-md-6">
            <div class="left-section">
            </div>
          </div>
          <div class="col-xs-6 col-md-6 pull-right">
           {{ Form::submit('Register', array('class' => 'btn btn-large btn-danger pull-right')) }}
         </div>
       </div>

     </div>
     {{ Form::close() }}
   </div>
 </div>

 @stop