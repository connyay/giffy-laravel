<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <title>
      @section('title')
      @show
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('assets/style.min.css') }}" rel="stylesheet">
   <style>
   @section('styles')
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
   <a class="navbar-brand" href="{{ URL::to('') }}">Giffy.co</a>
   </div>
   <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav">
   <li {{ (Request::is('gifs') ? 'class="active"' : '') }}><a href="{{ URL::to('gifs') }}">View All</a></li>
   @if (!Auth::guest())
   <li {{ (Request::is('gifs/mine') ? 'class="active"' : '') }}><a href="{{ URL::to('gifs/mine') }}">View Mine</a></li>
   <li {{ (Request::is('gifs/create') ? 'class="active"' : '') }}><a href="{{ URL::to('gifs/create') }}">Create</a></li>
   @endif
   </ul>
   <ul class="nav navbar-nav navbar-right">
   @if (!Auth::guest())
   <li><a href="{{ URL::to('gifs/mine') }}">Hi, {{ Auth::user()->username }}!</a></li>
   <li class="divider-vertical"></li>
   <li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
   @else
   <li {{ (Request::is('user/login') ? 'class="active"' : '') }}><a href="{{ URL::to('user/login') }}">Login</a></li>
   <li class="hidden" {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
   @endif
   </ul>
   </div>
   <!--/.nav-collapse -->
   </div>
   </div>
   <!-- Container -->
   <div class="container">
   <!-- Content -->
   @yield('content')
   <!-- ./ content -->
   </div>
   <!-- ./ container -->
   <!-- Javascripts
   ================================================== -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="{{ asset('assets/script.min.js') }}"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
   @yield('scripts')
   <!-- Notifications -->
   @include('notifications')
   <!-- ./ notifications -->
   </body>
   </html>
