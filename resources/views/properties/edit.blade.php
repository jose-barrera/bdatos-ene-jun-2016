@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Editar propiedad:</strong> {{ $property->alias }}
            </div>
            <div class="panel-body">
                {{ Form::model($property, ['route' => ['properties.update', $property->id],
                    'method' => 'put', 'class' => 'form-horizontal']) }}

                    <!-- Alias -->
                    <div class="form-group">
                        {{ Form::label('alias', 'Alias', ['class' => 'col-md-3 control-label']) }}
                        <div class="col-md-7">
                            {{ Form::text('alias', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Descripcion -->
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción', ['class' => 'col-md-3 control-label']) }}
                        <div class="col-md-7">
                            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Direccion -->
                    <div class="form-group">
                        {{ Form::label('address', 'Dirección', ['class' => 'col-md-3 control-label']) }}
                        <div class="col-md-7">
                            {{ Form::text('address', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Codigo postal -->
                    <div class="form-group">
                        {{ Form::label('postal_code', 'Código postal', ['class' => 'col-md-3 control-label']) }}
                        <div class="col-md-7">
                            {{ Form::number('postal_code', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Tipo propiedad -->
                    <div class="form-group">
                        {{ Form::label('type_id', 'Tipo de propiedad', ['class' => 'col-md-3 control-label']) }}
                        <div class="col-md-7">
                            {{ Form::select('type_id', App\Models\PropertyType::pluck('description', 'id'),
                                null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            <button type="primary" class="btn btn-primary btn-block">
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
