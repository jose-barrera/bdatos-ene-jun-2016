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
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Inquilinos</div>
			<div class="panel-body">
				<!-- Crear Mensaje -->
				<div id="toolbar">
					<a href="{{ route('tenants.create') }}" class="btn btn-primary">Nuevo Inquilino</a>
				</div>
				<!-- Tabla de Mensajes Recibidos -->
				<table data-toggle="table"
					data-detail-view="true"
					data-detail-formatter="detailFormatter"
					data-toolbar="#toolbar"
					data-show-export="true"
					data-search="true"
					data-show-columns="true"
					data-sort-name="fecha"
					data-sort-order="desc"
					data-locale="es-MX">
					<thead>
						<tr>
							<th data-field="nombre" data-sortable="true">Nombre</th>
							<th data-field="Email" data-sortable="false">Email</th>
							<th data-field="Celular" data-sortable="false">Celular</th>
							<th data-field="Telefono" data-sortable="false">Telefono</th>
							<th data-field="Oficina" data-sortable="false">Oficina</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($tenants as $key => $tenant)
						<tr>
							<td>{{ $tenant->full_name }}</td>
							<td>{{ $tenant->email }}</td>
							<td>{{ $tenant->mobile_phone }}</td>
							<td>{{ $tenant->home_phone }}</td>
							<td>{{ $tenant->office_phone }}</td>
							<span style="display: none;" id="tenant-{{ $key }}">
								<a type="button" href="{{-- route('tenants.property') --}}" class="btn btn-primary">Asignar a Propiedad</a>
							</span>
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
	function detailFormatter(index, row) {
		return $("#tenant-" + index).html();
	}
</script>
@endsection
