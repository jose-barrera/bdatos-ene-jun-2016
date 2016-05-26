<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Arrendamiento</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <script src="/js/jquery-2.2.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('js')
    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/simple-sidebar.css" rel="stylesheet" type="text/css">
    @yield('css')
    <link href="/css/app.css" rel="stylesheet" type="text/css">


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
                @if (!Auth::guest())
                    <!-- Sidebar toggle button -->
                    <a id="app-sidebar-toggle" class="navbar-brand">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </a>
                @endif
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('index') }}">
                    Sistema de Arrendamiento
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <!-- Navbar options -->
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->
                    @if (Auth::check())
                         <!-- Boton de usuario-->
                        <div class="collapse navbar-collapse">

                            <ul class="nav navbar-nav navbar-right">

                                <li class="dropdown">
                                    <!-- Nombre de usuario-->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-user"></span>
                                        <strong>&nbsp; {{ Auth::user()->first_name }} &nbsp;</strong>
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </a>

                                    <!-- contenido del boton-->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-login">
                                                <div class="row">
                                                    <!-- icono grande -->
                                                    <div class="col-sm-4">
                                                        <p class="text-center">
                                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                                        </p>
                                                    </div>
                                                    <!-- Nombre, email y boton de cuenta -->
                                                    <div class="col-sm-8">
                                                        <p class="text-left"><strong>{{ Auth::user()->full_name }}</strong></p>
                                                        <p class="text-left small">{{ Auth::user()->email }}</p>
                                                        <!-- <p class="text-left">
                                                            <a href="{{-- route('users.show', ['id' => Auth::user()->id]) --}}" class="btn btn-primary btn-block btn-sm"><b>Cuenta</b></a>
                                                        </p> -->
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

    <div id="wrapper" class="content toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                @if(Auth::check())
                    <!-- Opciones para arrendador -->
                    @if(Auth::user()->hasRole('lessor'))
                        <li class="sidebar-brand">
                            <b>Arrendador</b>
                        </li>
                        <li>
                            <a href="{{ route('properties.index') }}">Propiedades</a>
                        </li>
                        <li>
                            <a href="{{ route('properties.create') }}">Dar de alta Propiedad</a>
                        </li>
                        <li>
                            <a href="{{ route('tenants.index') }}">Inquilinos</a>
                        </li>
                        <li>
                            <a href="/register">Dar de alta Inquilino</a>
                        </li>
                        <li>
                            <a href="{{ route('messages.index') }}">Mensajes</a>
                        </li>
                        <li>
                            <a href="{{ route('messages.sent') }}">Mensajes Enviados</a>
                        </li>
                    @endif

                    <!-- Opciones para inquilino -->
                    @if(Auth::user()->hasRole('tenant'))
                        <li class="sidebar-brand">
                            <b>Inquilino</b>
                        </li>
                        <li>
                            <a href="{{ route('messages.index') }}">Mensajes</a>
                        </li>
                        <li>
                            <a href="{{ route('messages.sent') }}">Mensajes Enviados</a>
                        </li>
                        <li>
                            <a href="#">Estado y Resolucion</a>
                        </li>
                        <li>
                            <a href="#">Datos del Arrendador</a>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <!-- /#sidebar -->

        <div id="page-content-wrapper">

            <!-- Flash messages -->
            @if(Session::has('flash.message'))
                <div class="alert alert-{{ Session::get('flash.level', 'info') }}">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('flash.message') }}
                </div>
            @endif

            <!-- Page content -->
            @yield('content')
        </div>

    </div>

    <footer class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{ route('index') }}">© {{ date("Y") }} Sistema de Arrendamiento</a></li>
                        <li><a href="{{ route('terms') }}">Términos y Condiciones</a></li>
                        <li><a href="{{ route('terms') }}">Privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
    <!-- JavaScripts -->
    <script>
        $('#app-sidebar-toggle').click(function() {
            $('#wrapper').toggleClass('toggled');
        });
    </script>

    @yield('scripts')
</html>
