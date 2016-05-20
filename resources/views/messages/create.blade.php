@extends('layouts.app')

@section('css')
<link href="/css/bootstrap-tagsinput.css" rel="stylesheet">
@endsection
@section('js')
<script src="/js/bootstrap-tagsinput.js"></script>
<script src="/js/message.js"></script>

@endsection
@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Crear Mensaje</div>
		<div class="panel-body">
			<!-- Formulario -->
			{{ Form::open(['method' => 'POST', 'class' => 'form-horizontal']) }}

				<!-- Inquilinos -->
				<div class="form-group{{ $errors->has('tenants') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Inquilinos:</label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="tenants" value="{{ old('tenants') }}" data-role="tagsinput" required>

						@if ($errors->has('tenants'))
						<span class="help-block">
							<strong>{{ $errors->first('tenants') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<!-- Asunto -->
				<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Asunto:</label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="subject" required>

						@if ($errors->has('subject'))
						<span class="help-block">
							<strong>{{ $errors->first('subject') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<!-- Mensaje a enviar -->
				<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Mensaje:</label>

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
