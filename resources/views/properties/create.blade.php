@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Alta de Propiedades</div>
			<div class="panel-body">
				{{ Form::open(['route' => 'properties.store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
					{{ Form::hidden('lessor_id', $user->id )}}

					<!-- Alias -->
					<div class="form-group">
						{{ Form::label('alias', 'Alias', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::text('alias', null, ['class' => 'form-control']) }}
						</div>
					</div>

					<!-- Descripcion -->
					<div class="form-group">
						{{ Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::textarea('description', null, ['class' => 'form-control']) }}
						</div>
					</div>

					<!-- Direccion -->
					<div class="form-group">
						{{ Form::label('address', 'Dirección', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::textarea('address', null, ['class' => 'form-control']) }}
						</div>
					</div>

					<!-- Codigo postal -->
					<div class="form-group">
						{{ Form::label('postal_code', 'Código Postal', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::number('postal_code', null, ['class' => 'form-control']) }}
						</div>
					</div>

					<!-- Tipo de propiedad -->
					<div class="form-group">
						{{ Form::label('type_id', 'Tipo de propiedad', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::select('type_id', $property_types->pluck('description', 'id'),
								null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...']) }}
						</div>
					</div>

					<!-- Boton de submit -->
					<div class="form-group">
						<div class="col-md-7 col-md-offset-3">
							<button type="submit" class="btn btn-primary btn-block">
								<span class="glyphicon glyphicon-ok"></span> Guardar
							</button>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection
