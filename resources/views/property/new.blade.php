@extends('layouts.app')

@section('content')
<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">Alta de Propiedades</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST"
					action="{{ route('property.store') }}">
				{!! csrf_field() !!}

				<input type="hidden" name="lessor_id" value="{{ $user->id }}">

				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Titulo<span style="color: red">*</span></label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="title" value="{{ old('title') }}" required>

						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Descripción<span style="color: red">*</span></label>

					<div class="col-md-6">
						<textarea class="form-control" name="description" required>{{ old('description') }}</textarea>

						@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Dirección<span style="color: red">*</span></label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="address" value="{{ old('address') }}" required>

						@if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Código Postal<span style="color: red">*</span></label>

					<div class="col-md-6">
						<input type="number" class="form-control" name="postal_code" value="{{ old('postal_code') }}" required>

						@if ($errors->has('postal_code'))
						<span class="help-block">
							<strong>{{ $errors->first('postal_code') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Tipo de Propiedad<span style="color: red">*</span></label>

					<div class="col-md-6">
						<select class="form-control" name="type_id" required>
							<option value="">Seleccionar</option>
						@foreach($property_types as $property_type)
							<option value="{{ $property_type->id }}">{{ $property_type->description }}</option>
						@endforeach
						</select>

						@if ($errors->has('type_id'))
						<span class="help-block">
							<strong>{{ $errors->first('type_id') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('property_group_id') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Grupo de Propiedades</label>

					<div class="col-md-6">
						<select class="form-control" name="property_group_id">
							<option value="">Seleccionar</option>
							@foreach($property_groups as $property_group)
							<option value="{{ $property_group->id }}">{{ $property_group->description }}</option>
							@endforeach
						</select>

						@if ($errors->has('property_group_id'))
						<span class="help-block">
							<strong>{{ $errors->first('property_group_id') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-ok"></span> Guardar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
