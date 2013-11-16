<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> 
		@section('title') 
		@show 
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
		<!--<link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrapSwitch.css') }}" rel="stylesheet"> -->
		<!-- Bootstrap switch from https://github.com/nostalgiaz/bootstrap-switch.git -->
		<style>
		@section('styles')
		body {
			padding-top: 60px;
		}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->


		</head>

		<body>

		<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Giffy.co</a>
		</div>
		<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('gifs') }}">View All</a></li>
		@if (!Auth::guest())
		<li><a href="{{ URL::to('gifs/mine') }}">View Mine</a></li>
		<li><a href="{{ URL::to('gifs/create') }}">Create</a></li>
		@endif
		</ul>
		<ul class="nav navbar-nav navbar-right">

		@if (!Auth::guest())
		<li class="navbar-text">Hi, {{ Auth::user()->username }}</li>
		<li class="divider-vertical"></li>
		<li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
		@else
		<li {{ (Request::is('user/login') ? 'class="active"' : '') }}><a href="{{ URL::to('user/login') }}">Login</a></li>
		<li class="hidden" {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
		@endif

		</ul>
		</div><!--/.nav-collapse -->
		</div>
		</div>

		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top hidden">
		<div class="navbar-inner">
		<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</a>

		<div class="nav-collapse collapse">
		<ul class="nav">
		<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('') }}">Giffy.co</a></li>
		</ul>

		<ul class="nav pull-right">
		<li><a href="{{ URL::to('gifs') }}">Gifs</a></li>
		<li><a href="{{ URL::to('gifs/create') }}">Add Gif</a></li>
		<li class="divider-vertical"></li>
		@if (!Auth::guest())
		<li class="navbar-text">{{ Auth::user()->username }}</li>
		<li class="divider-vertical"></li>
		<li class="hidden" {{ (Request::is('users/show/' . Auth::user()->id) ? 'class="active"' : '') }}><a href="{{ URL::to('/users/show/'.Auth::user()->id) }}">Account</a></li>
		<li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
		@else
		<li {{ (Request::is('user/login') ? 'class="active"' : '') }}><a href="{{ URL::to('user/login') }}">Login</a></li>
		<li class="hidden" {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
		@endif
		</ul>
		</div>
		<!-- ./ nav-collapse -->
		</div>
		</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
		<!-- Notifications -->
		@include('notifications')
		<!-- ./ notifications -->

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->
		</div>

		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script> <!-- Thanks to Zizaco for this script:  http://zizaco.net  -->
		@yield('scripts')
		</body>
		</html>
