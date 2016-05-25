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
					<div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}{{ $errors->has('alias') ? ' has-error' : '' }}">
						{{ Form::label('alias', 'Alias', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::text('alias', null, ['class' => 'form-control']) }}
							@if ($errors->has('alias'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alias') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Descripcion -->
					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						{{ Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::textarea('description', null, ['class' => 'form-control']) }}
							@if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Direccion -->
					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
						{{ Form::label('address', 'Dirección', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::textarea('address', null, ['class' => 'form-control']) }}
							@if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Codigo postal -->
					<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
						{{ Form::label('postal_code', 'Código Postal', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::number('postal_code', null, ['class' => 'form-control']) }}
							@if ($errors->has('postal_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Precio de renta -->
					<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
						{{ Form::label('price', 'Precio de Renta', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::number('price', null, ['class' => 'form-control']) }}
							@if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Costo del mantenimiento -->
					<div class="form-group{{ $errors->has('maintenance_cost') ? ' has-error' : '' }}">
						{{ Form::label('maintenance_cost', 'Costo de Mantenimiento', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::number('maintenance_cost', null, ['class' => 'form-control']) }}
							@if ($errors->has('maintenance_cost'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('maintenance_cost') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Capacidad de habitaciones -->
					<div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
						{{ Form::label('capacity', 'Capacidad', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::number('capacity', null, ['class' => 'form-control']) }}
							@if ($errors->has('capacity'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('capacity') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Tipo de contrato -->
					<div class="form-group{{ $errors->has('contract_id') ? ' has-error' : '' }}">
						{{ Form::label('contract_id', 'Contrato', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::select('contract_id', $contract_types->pluck('description', 'id'),
								null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...']) }}
								@if ($errors->has('contract_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contract_id') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<!-- Tipo de propiedad -->
					<div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
						{{ Form::label('type_id', 'Tipo de propiedad', ['class' => 'control-label col-md-3']) }}
						<div class="col-md-7">
							{{ Form::select('type_id', $property_types->pluck('description', 'id'),
								null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...']) }}
								@if ($errors->has('type_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type_id') }}</strong>
                                </span>
                            @endif
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
