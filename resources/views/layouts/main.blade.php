<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produits | Bienvenue</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    	<!-- script -->
      <script src="/js/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
      <script src="/js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  
      <!-- link -->
      <link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
      <link href="/css/app.css" rel="stylesheet" media="screen" />
      <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  </head>
<body>
<!--  nav -->

<header id="header">
  <nav class="navbar navbar-default bg-light"">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header" style="width:100%">
        <div class="row">
          <div class="col-sm-6">
            <a class="navbar-brand" href="#">LOGO</a>
          </div>
          <div class="col-sm-3 >
            <ul class="nav navbar-nav navbar-right">
              @if(Illuminate\Support\Facades\Auth::check())
              <li style="float:right;list-style-type:none" > Bienvenue {{ Auth::user()->name}} 
              <form method="POST" action="{{ route('logout') }}">
                   @csrf
                  <input type="submit"  value="logout" class="btn btn-outline-secondary"/>                     
               </form>
              </li> 
              @endif
              <li class="dropdown" id="cart" style="list-style-type:none">
                {{ $cart ?? '' }} 
              </li>
            </ul>
          </div>
          </div>
      
      </div>

    </div><!-- /.container-fluid -->
  </nav>
</header>

 <div class="container-fluid">
  @yield('content')

 </div>



</body>
</html>