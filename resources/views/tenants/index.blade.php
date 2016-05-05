@extends('layouts.app')

@section('content')

    <!-- contenido de la aplicacion -->
    <div id="wrapper" class="content">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="text-align: center;">
                        <b>Menu</b>
                    </a>
                </li>
                <li>
                    <a href="mensaje_inquilino.html">Mensajes</a>
                </li>
                <li>
                    <a href="#">Estado y Resolucion</a>
                </li>
                <li>
                    <a href="#">Datos del Arrendador</a>
                </li>
                <li> 
                    <a href="notificacion_inquilino.html">Notificaciones Recibidas</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Contenido de app -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @yield('content_tenants')
                </div>
            </div>
        </div>
        <!-- /#contenido de la aplicacion -->

    </div>
    <!-- /contenido de la aplicacion -->


    <!-- App Footer-->
    <div id="includedContent"></div>
    <!-- /App Footer-->
@endsection
