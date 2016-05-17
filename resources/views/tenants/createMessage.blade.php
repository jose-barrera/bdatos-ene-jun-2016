@extends('layouts.app')

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Crear Mensaje</div>
		<div class="panel-body">
			<!-- Formulario -->
			{{ Form::open(['method' => 'POST', 'class' => 'form-horizontal']) }}
				
				<!-- Asunto -->
				<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Asunto:<span style="color: red">*</span></label>

					<div class="col-md-6">
						<select class="form-control" name="subject" required>
							<option value="">Seleccionar</option>
							<option value="Departamento">Departamento</option>
							<option value="Estacionamiento">Estacionamiento</option>
							<option value="Servicios">Servicios</option>
						</select>

						@if ($errors->has('subject'))
						<span class="help-block">
							<strong>{{ $errors->first('subject') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<!-- Mensaje a enviar -->
				<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Mensaje:<span style="color: red">*</span></label>

					<div class="col-md-6">
						<textarea class="form-control" name="message" required>{{ old('message') }}</textarea>

						@if ($errors->has('message'))
						<span class="help-block">
							<strong>{{ $errors->first('message') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<!-- Boton de Enviar -->
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-ok"></span> Enviar
						</button>
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection
