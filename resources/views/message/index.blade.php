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
			<div class="panel-heading">Mensajes Arrendador</div>
			<div class="panel-body">
				<!-- Crear Mensaje -->
				<div id="toolbar">
					<a href="{{ route('message.create') }}" class="btn btn-primary">Enviar Mensaje</a>
				</div>
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
							<th data-field="nombre" data-sortable="true">Nombre</th>
							<th data-field="asunto" data-sortable="true">Asunto</th>
							<th>Mensaje</th>
							<th data-field="fecha" data-sortable="true">Fecha</th>
							<th style="width: 36px;">Opción</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($messages as $message)
					<tr{!! $message->read_on?:' class="danger"' !!}>
							<td>{{ $message->sender->getFullNameAttribute() }}</td>
							<td>{{ $message->subject }}</td>
							<td>{{ $message->content }}</td>
							<td>{{ $message->created_at }}</td>
							<td style="text-align: center">
								<a href="#Modal" role="button" data-toggle="modal" ><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i></a>
								<a href="#Modal" role="button" data-toggle="modal" ><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>
							</td>
					</tr>
					@endforeach
						</tr>
					</tbody>
				</table>
				<!-- Paginador -->
				{{-- $notification->render() --}}
			</div>
		</div>
	</div>
@endsection
