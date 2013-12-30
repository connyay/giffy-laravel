<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Giffy.co API</title>
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('css/api.css') }}" rel="stylesheet">
   </head>
   <body>
      <div id="wrapper">
         <!-- Sidebar -->
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li class="sidebar-brand"><a href="#">Giffy.co API</a></li>
               <li><a href="#user">User</a></li>
               <li><a href="#gifs">Gifs</a></li>
               <li><a href="#tags">Tags</a></li>
            </ul>
         </div>
         <!-- Page content -->
         <div id="page-content-wrapper">
            <div class="content-header">
               <h1>
                  <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                  Giffy.co API
               </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
               <div class="row">
                  <div class="col-md-12">
                     <p class="lead">Documentation for the giffy.co REST API.</p>
                  </div>
                  <div class="col-md-7">
                     <div class="page-header">
                        <h1 id="user">User</h1>
                     </div>
                     <h3><small>GET</small> {{$route}}me</h3>
                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                              <td>Description</td>
                              <td>Returns the currently logged in user.</td>
                           </tr>
                           <tr>
                              <td>Method</td>
                              <td><code>GET</code></td>
                           </tr>
                           <tr>
                              <td>URL</td>
                              <td><code>{{$route}}me</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <h5>Logged in response:</h5>
                     <pre>{
  "status": 200,
  "user": {
    "id": {userid},
    "username": {username}
  }
}</pre>
                     <h5>Not logged in response:</h5>
                     <pre>
{
  "status": 401,
  "user": {
    "guest": true
  }
}</pre>
                     <h3><small>GET</small> {{$route}}logout</h3>
                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                           <tr>
                              <td>Description</td>
                              <td>Logs the current user out.</td>
                           </tr>
                           <td>Method</td>
                           <td><code>GET</code></td>
                           </tr>
                           <tr>
                              <td>URL</td>
                              <td><code>{{$route}}logout</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <pre>{
  "status": 200,
  "message": "Logged out successfully"
}</pre>
                     <h3><small>POST</small> {{$route}}login</h3>
                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                              <td>Description</td>
                              <td>Authenticates future calls with provided credentials.</td>
                           </tr>
                           <tr>
                              <td>Method</td>
                              <td><code>POST</code></td>
                           </tr>
                           <tr>
                              <td>URL</td>
                              <td><code>{{$route}}login</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                           <tr>
                              <td rowspan="2">Parameters</td>
                              <td><code>username</code></td>
                           </tr>
                           <tr>
                              <td><code>password</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <h5>Successful login:</h5>
                     <pre>{
  "status": 200,
  "user": {
      "id": {userid},
      "username": {username}
    }
}</pre>
                     <h5>Unsuccessful login:</h5>
                     <pre>{
  "status": 401,
  "message": "Couldn't login with provided credentials. Try again."
}</pre>
                  </div>
                  <div class="col-md-7">
                     <div class="page-header">
                        <h1 id="gifs">Gifs</h1>
                     </div>

<h3><small>GET</small> {{$route}}gifs</h3>
                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                           <tr>
                              <td>Description</td>
                              <td>Returns 100 Gifs.</td>
                           </tr>
                           <td>Method</td>
                           <td><code>GET</code></td>
                           </tr>
                           <tr>
                              <td>URL</td>
                              <td><code>{{$route}}gifs</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <pre>{
    "status": 200,
    "count": 100,
    "gifs": [
        {
            "id": "249",
            "url": "http://i.imgur.com/Y7ZWLio.gif",
            "thumb": "http://giffy.co/thumbs/Y7ZWLio.gif"
        },
        ...
        {
            "id": "149",
            "url": "http://i.imgur.com/nl8YdYW.gif",
            "thumb": "http://giffy.co/thumbs/nl8YdYW.gif"
        }
    ]
}}</pre>
<h3><small>GET</small> {{$route}}gifs/{limit} <small>or</small> {{$route}}gifs/limit/{limit}</h3>

                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                           <tr>
                              <td>Description</td>
                              <td>Returns requested number of Gifs.</td>
                           </tr>
                           <td>Method</td>
                           <td><code>GET</code></td>
                           </tr>
                           <tr>
                              <td rowspan="2">URL</td>
                              <td><code>{{$route}}gifs/{limit}</code></td>
                           </tr>
                           <tr>
                              <td><code>{{$route}}gifs/limit/{limit}</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <pre>{
    "status": 200,
    "count": 10,
    "gifs": [
        {
            "id": "249",
            "url": "http://i.imgur.com/Y7ZWLio.gif",
            "thumb": "http://giffy.co/thumbs/Y7ZWLio.gif"
        },
        ...
        {
            "id": "240",
            "url": "http://i.imgur.com/bTlIioQ.gif",
            "thumb": "http://giffy.co/thumbs/bTlIioQ.gif"
        }
    ]
}}</pre>
<h3><small>GET</small> {{$route}}gifs/limit/{limit}/offset/{offset}</h3>

                     <table class="table table-bordered table-condensed table-striped">
                        <tbody>
                           <tr>
                           <tr>
                              <td>Description</td>
                              <td>Returns requested number of Gifs offset by requested amount.</td>
                           </tr>
                           <td>Method</td>
                           <td><code>GET</code></td>
                           </tr>
                           <tr>
                              <td>URL</td>
                              <td><code>{{$route}}gifs/limit/{limit}/offset/{offset}</code></td>
                           </tr>
                           <tr>
                              <td>Response</td>
                              <td><code>application/json</code></td>
                           </tr>
                        </tbody>
                     </table>
                     <pre>{
    "status": 200,
    "count": 10,
    "gifs": [
        {
            "id": "249",
            "url": "http://i.imgur.com/Y7ZWLio.gif",
            "thumb": "http://giffy.co/thumbs/Y7ZWLio.gif"
        },
        ...
        {
            "id": "240",
            "url": "http://i.imgur.com/bTlIioQ.gif",
            "thumb": "http://giffy.co/thumbs/bTlIioQ.gif"
        }
    ]
}}</pre>
                  </div>
                  <div class="col-md-7">
                     <div class="page-header">
                        <h1 id="tags">Tags</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script>
         $("#menu-toggle").click(function (e) {
             e.preventDefault();
             $("#wrapper").toggleClass("active");
         });
      </script>
   </body>
</html>
