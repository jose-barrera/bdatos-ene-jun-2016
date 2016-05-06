@extends('layouts.app')

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Alta de Propiedades</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{URL::action('LessorController@getRegisterProperty')}}">
				{!! csrf_field() !!}

				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Titulo<span style="color: red">*</span></label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="title" value="{{ old('title') }}">

						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Direccion<span style="color: red">*</span></label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="address" value="{{ old('address') }}">

						@if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('type_prop') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Tipo de Propiedad<span style="color: red">*</span></label>

					<div class="col-md-6">
						<select class="form-control" name="type_prop" required>
							<!--foreach($type_props as $type)-->
							<!--<option value=" $type->value "> $type->value </option>-->
							<!--endforeach;-->
						</select>

						@if ($errors->has('type_prop'))
						<span class="help-block">
							<strong>{{ $errors->first('type_prop') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('lessor') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Arrendador<span style="color: red">*</span></label>

					<div class="col-md-6">
						<select class="form-control" name="lessor" required>
							<!--foreach($lessors as $lessor)-->
							<!--<option value=" $lessor->value ">$lessor->value </option>-->
							<!--endforeach;-->
						</select>

						@if ($errors->has('lessor'))
						<span class="help-block">
							<strong>{{ $errors->first('lessor') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('property_group') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label">Grupo de Propiedades<span style="color: red">*</span></label>

					<div class="col-md-6">
						<select class="form-control" name="property_group" required>
							<!--foreach($property_groups as $property_group)-->
							<!--<option value=" $property_group->value "> $property_group->value </option>-->
							<!--endforeach;-->
						</select>

						@if ($errors->has('property_group'))
						<span class="help-block">
							<strong>{{ $errors->first('property_group') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-btn fa-user"></i>Guardar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection