@extends('layouts.app')

@section('content')
<!-- contenido de la aplicacion -->
<div id="wrapper" class="content">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    <b>Menu</b>
                </a>
            </li>
            <li>
                <a href="#">Dar de alta Propiedad</a>
            </li>
            <li>
                <a href="#">Asignar Inquilino a Propiedad</a>
            </li>
            <li> <!-- Recibir mensajes , mensajes filtrados-->
                <a href="mensajes_arrendador.html">Mensajes</a>
            </li>
            <li>
                <a href="notificacion_arrendador.html">Notificar a Inquilino</a>
            </li>
            <li>
                <a href="estado_propiedades.html">Estado de las Propiedades</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar -->

    <!-- Contenido de app -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                @yield('content_landlords')
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
