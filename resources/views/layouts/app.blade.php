<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Arrendamiento</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet" type="text/css">

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistema de Arrendamiento
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                         <!-- Botton de usuario-->
                        <div class="collapse navbar-collapse">

                            <ul class="nav navbar-nav navbar-right">

                                <li class="dropdown">
                                    <!-- Nombre de usuario-->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <strong>&nbsp; {{ Auth::user()->name }} &nbsp;</strong>
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </a>

                                    <!-- contenido del boton-->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-login">
                                                <div class="row">
                                                    <!-- icono grande -->
                                                    <div class="col-lg-4">
                                                        <p class="text-center">
                                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                                        </p>
                                                    </div>
                                                    <!-- Nombre, email y boton de cuenta -->
                                                    <div class="col-lg-8">
                                                        <p class="text-left"><strong>{{ Auth::user()->name }}</strong></p>
                                                        <p class="text-left small">{{ Auth::user()->email }}</p>
                                                        <p class="text-left">
                                                            <a href="#" class="btn btn-primary btn-block btn-sm"><b>Cuenta</b></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- linea divisora -->
                                        <li class="divider"></li>

                                        <!-- boton cerrar sesion -->
                                        <li>
                                            <div class="navbar-login navbar-login-session">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>
                                                            <a href="{{ url('/logout') }}" class="btn btn-danger btn-block"><b>Cerrar Sesion</b></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    

    <footer class="navbar navbar-default navbar-fixed-bottom">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="/">© {{ date("Y") }} Nombre de la Compañia</a></li>
                    <li><a href="#">Terminos de servicio</a></li>
                    <li><a href="#">Privacidad</a></li>
                </ul>
            </div>
        </div>
    </div>

    </footer>
    <!-- JavaScripts -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
