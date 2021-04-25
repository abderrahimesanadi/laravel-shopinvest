<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produits | Bienvenue</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
<!--  nav -->

<header id="header">
  <nav class="navbar navbar-default bg-light"">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header" style="width:100%">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3"">
            <a class="navbar-brand" href="#">LOGO</a>
          </div>
          <div class="col-sm-3 >
            <ul class="nav navbar-nav navbar-right">
              @if(Illuminate\Support\Facades\Auth::check())
              <li style="float:right"> Bienvenue {{ Auth::user()->name}} 
              <form method="POST" action="{{ route('logout') }}">
                   @csrf
                  <input type="submit"  value="logout" class="btn btn-outline-secondary"/>                     
               </form>
              </li> 
              @else
              <li class="dropdown" id="cart">
                <a href="#"></a>
              </li>
              @endif
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



  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</body>
</html>