@extends('layouts.app')

@section('css')
<link href="/css/bootstrap-table.css" rel="stylesheet">
@endsection
@section('js')
<script src="/js/bootstrap-table.js"></script>
<script src="/js/bootstrap-table-export.js"></script>
<script src="/js/tableExport.js"></script>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Mensajes de Inquilinos</div>
            <div class="panel-body">
                <!-- Tabla de Mensajes Recibidos -->
                <table data-toggle="table"
                    data-toolbar="#toolbar"
                    data-show-export="true" 
                    data-search="true"
                    data-show-columns="true"
                    data-sort-name="fecha"
                    data-sort-order="desc">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-field="nombre" data-sortable="true">Nombre</th>
                            <th data-field="asunto" data-sortable="true">Asunto</th>
                            <th>Mensaje</th>
                            <th data-field="fecha" data-sortable="true">Fecha</th>
                            <th style="width: 36px;">Opción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Chris</td>
                            <td>Agua</td>
                            <td>No tengo servicio de agua en...</td>
                            <td>10/01/2016</td>
                            <td style="text-align: center">
                                <a href="#myModal" role="button" data-toggle="modal" ><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>alan</td>
                            <td>Agua</td>
                            <td>No tengo servicio de agua en...</td>
                            <td>10/02/2016</td>
                            <td style="text-align: center">
                                <a href="#Modal" role="button" data-toggle="modal" ><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Paginador -->
                {{-- $notification->render() --}}
            </div>
        </div>
    </div>
@endsection
