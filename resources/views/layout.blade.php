<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Hire Me</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hire Me</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          @if(Auth::check())
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <span class="icon icon-wh i-profile"></span> {!! Auth::user()->full_name !!} <span class="caret"></span> 
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{!! route('profile') !!}">Editar perfil</a></li>
                  <li><a href="{!! route('account') !!}">Editar usuario</a></li>
                  <li><a href="{!! route('logout') !!}">Salir</a></li>
                </ul>
              </li>
            </ul>
          @else
            {!! Form::open(['route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right']) !!}
              @if(Session::has('login_error'))
                <span class="label label-danger">Credenciales no válidas</span>
              @endif
              <div class="form-group">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
              </div>
              <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
              </div>
              <div class="checkbox">
                <label class="remember-me">
                  {!! Form::checkbox('remember') !!} Recordarme
                </label>
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            {!! Form::close() !!}
          @endif
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    @yield('content')
    

    <div class="container">
      <hr>

      <footer>
        <p>&copy; Todos los Derechos Reservados - 2015</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
