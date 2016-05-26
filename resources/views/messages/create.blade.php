@extends('layouts.app')

@section('css')
<link href="/css/bootstrap-tagsinput.css" rel="stylesheet">
@endsection

@section('js')
<script src="/js/bootstrap-typeahead.js"></script>
<script src="/js/bootstrap-tagsinput.js"></script>
<script src="/js/message.js"></script>
@endsection

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Crear Mensaje</div>
		<div class="panel-body">
			<!-- Formulario -->
			{{ Form::open(['route' => 'messages.store', 'method' => 'POST',
				'class' => 'form-horizontal']) }}
				

				<!-- Inquilinos -->
				<div class="form-group">
					{{ Form::label('receiver_id', 'Inquilino', ['class' => 'control-label col-md-4']) }}

					<div class="col-md-6">
						{{ Form::text('receiver_id', null, ['class' => 'form-control']) }}
					</div>
				</div>

				<!-- Asunto -->
				<div class="form-group">
					{{ Form::label('subject', 'Asunto', ['class' => 'control-label col-md-4']) }}

					<div class="col-md-6">
						{{ Form::text('subject', null, ['class' => 'form-control']) }}
					</div>
				</div>

				<!-- Mensaje a enviar -->
				<div class="form-group">
					{{ Form::label('content', 'Mensaje', ['class' => 'control-label col-md-4']) }}

					<div class="col-md-6">
						{{ Form::textarea('content', null, ['class' => 'form-control']) }}
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

@section('scripts')
@if(isset($user))
<script>
	$(document).ready(function($) {
		$('input[name="receiver_id"]').tagsinput('add', { id: '{{ $user->id }}', name_email: '{{ $user->email}} ' });
	});
</script>
@endif
@endsection