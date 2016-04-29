@extends('layouts.app')

@section('content')
<!-- Esta es la barra de busqueda que se va a usar para buscar arrendatarios -->

<!-- break line to separate elements using bootstrap-->
<div class="clearfix separator" style="margin: 15px"></div>

<!-- Search Bar -->
<div class="search-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">

                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Buscar arrendatario">

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


<!-- Control de arrandatarios -->
<div class="container">

    <!-- Tabla de arrandatarios -->
    <div class="well">
        <table class="table">
            <thead>
                <tr>
                    <th class="glyphicon glyphicon-th-list" aria-hidden="true"></th>
                    <th>#</th>
                    <th>Nombre</th>
                    <th style="width: 36px;">Eliminar</th>
                    <th style="width: 36px;">Editar</th>
                </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullName() }}</td>
                    <td style="text-align: center">
                        <a href="{{ route('users.destroy', []) }}" role="button" data-toggle="modal"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> </a>
                    </td>
                    <td style="text-align: center">
                        <a href="#myModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> </a>
                    </td>
                </tr>
            @endforeach
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
            <p class="error-text">¿Seguro que deseas eliminar este arrendatario?</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger" data-dismiss="modal">Eliminar</button>
        </div>
    </div>
    <!-- /Controles de confirmacion -->

</div>
<!-- Control de mensajes -->

@endsection
