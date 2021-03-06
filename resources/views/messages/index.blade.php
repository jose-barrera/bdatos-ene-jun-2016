@extends('layouts.app')

@section('css')
<link href="/css/bootstrap-table.css" rel="stylesheet">
<style>
	form { display: none; }
</style>
@endsection

@section('js')
<script src="/js/bootstrap-table.js"></script>
<script src="/js/bootstrap-table-export.js"></script>
<script src="/js/tableExport.js"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Mensajes Arrendador</div>
			<div class="panel-body">
				<!-- Crear Mensaje -->
				<div id="toolbar">
					<a href="{{ route('messages.create') }}" class="btn btn-primary">Enviar Mensaje</a>
				</div>
				<!-- Tabla de Mensajes Recibidos -->
				<table data-toggle="table"
					data-toolbar="#toolbar"
					data-show-export="true"
					data-search="true"
					data-show-columns="true"
					data-sort-name="fecha"
					data-sort-order="desc"
					data-locale="es-MX">
					<thead>
						<tr>
							@if(@$sent)
								<th data-field="nombre" data-sortable="true">Para</th>
							@else
								<th data-field="nombre" data-sortable="true">De</th>
							@endif
							<th data-field="asunto" data-sortable="true">Asunto</th>
							<th data-field="mensaje" data-sortable="false">Mensaje</th>
							<th data-field="fecha" data-sortable="true">Fecha</th>
							<th style="width: 36px;">Opción</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($messages as $message)
						<tr{!! $message->read ? ' class="danger"' : '' !!}{!!' data-id="'.$message->id.'"'!!}>
							@if(@$sent)
							<td>{{ $message->receiver->full_name }}</td>
							@else
							<td>{{ $message->sender->full_name }}</td>
							@endif
							<td>{{ $message->subject }}</td>
							<td>{{ $message->content }}</td>
							<td>{{ $message->created_at }}</td>
							<td style="text-align: center;">
								<a onclick="$('#read-message-{{ $message->id }}').submit();" role="button" data-toggle="modal">
									<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
								</a>
								{{ Form::open(['route' => ['messages.update', $message->id], 'method' => 'PATCH',
									'id' => 'read-message-' . $message->id ]) }}
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<!-- Paginador -->
				{{-- $notification->render() --}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function($) {
		$('tbody>tr').click(function() {
			window.location='messages/'+$(this).attr('data-id');
		});
	});
</script>
@endsection