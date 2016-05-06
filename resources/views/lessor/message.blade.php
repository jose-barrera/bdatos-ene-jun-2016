@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="clearfix separator" style="margin: 15px"></div>

          <!-- Search Bar -->
        <div class="search-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="input-group">

                            <!-- Filtrar por usuario -->
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Filtar por</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#Inquilino">Inquilino</a></li>
                                    <li><a href="#Arrendatario">Arrendatario</a></li>
                                </ul>
                            </div>
                            <!-- /Filtrar por -->

                            <!-- Filtrar por mensaje-->
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Asunto/Contenido</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#Asunto">Asunto</a></li>
                                    <li><a href="#Contenido">Contenido</a></li>
                                </ul>
                            </div>
                            <!-- /Filtrar por -->

                            <!-- Ordenar por -->
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_filter">Ordenar por</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#Recientes">Recientes</a></li>
                                    <li><a href="#Antiguos">Antiguos</a></li>
                                </ul>
                            </div>
                            <!-- /Ordenar por -->

                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control" name="x" placeholder="¿Que deseas buscar?">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Search Bar -->

        <!-- break line to separate elements using bootstrap-->
        <div class="clearfix separator" style="margin: 15px"></div>

        <!-- Los resultados de la busqueda deberan mostrarse alimentando una tabla como esta asi. -->


        <!-- Control de mensajes -->
        <div class="container">

            <!-- Tabla de mensajes -->
            <div class="well">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="glyphicon glyphicon-th-list" aria-hidden="true"></th>
                            <th>#</th>
                            <th>Inquilino</th>
                            <th>Nombre</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th style="width: 36px;">Opción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                            <td>
                                <input type="checkbox">
                            </td>
                            <td>1</td>
                            <td>inquilino</td>
                            <td>Chris</td>
                            <td>Agua</td>
                            <td>No tengo servicio de agua en...</td>
                            <td style="text-align: center">
                                <a href="#myModal" role="button" data-toggle="modal" ><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /Tabla de mensajes -->


            <!-- Paginacion -->
            <div style="text-align: center">
                <ul class="pagination">
                    <li><a href="#">Prev.</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Sig.</a></li>
                </ul>
            </div>
            <!-- /Paginacion -->


            <!-- Controles de confirmacion (No funcionan bien) -->
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style=" position: fixed; top: 40%; left: 50%; transform: translate(-50%, -50%); ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel" style="text-align: center">Confirmación</h3>
                </div>
                <div class="modal-body">
                    <p class="error-text">¿Seguro que deseas eliminar este mensaje?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
            <!-- /Controles de confirmacion -->

        </div>
        <!-- Control de mensajes -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
    </div>
@endsection
