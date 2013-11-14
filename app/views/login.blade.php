<!doctype html>
<html>
<head>
	<title>Look at me Login</title>
</head>
<body>

	{{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		@if (Session::get('loginError'))
		<div class="alert alert-danger">{{ Session::get('loginError') }}</div>
		@endif

		<p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

</body>
</html>