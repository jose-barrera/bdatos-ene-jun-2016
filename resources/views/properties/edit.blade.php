@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Editar propiedad: {{ $property->alias }}</h3>
            </div>
            <div class="panel-body">
                {{ Form::model($property, ['route' => ['properties.update', $property->id],
                    'method' => 'put', 'class' => 'form-horizontal']) }}

                    <!-- Alias -->
                    <div class="form-group">
                        {{ Form::label('alias', 'Alias', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('alias', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Descripcion -->
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Direccion -->
                    <div class="form-group">
                        {{ Form::label('address', 'Dirección', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('address', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Codigo postal -->
                    <div class="form-group">
                        {{ Form::label('postal_code', 'Código postal', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::number('postal_code', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Tipo propiedad -->
                    <div class="form-group">
                        {{ Form::label('type_id', 'Tipo de propiedad', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('type_id', App\Models\PropertyType::pluck('description', 'id'),
                                null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Grupo de propiedades -->
                    <div class="form-group">
                        {{ Form::label('property_group_id', 'Grupo de propiedades', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('property_group_id', App\Models\PropertyGroup::pluck('description', 'id'),
                                null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
