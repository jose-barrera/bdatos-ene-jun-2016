@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Rentar</strong> {{ $property->title }}</div>
            <div class="panel-body">
                {{ Form::model($property->currentRent, ['route' => ['properties.post_rent', $property->id], 'class' => 'form-horizontal']) }}

                    <!-- Propiedad -->
                    {{ Form::hidden('property_id', $property->id) }}

                    <!-- Arrendador -->
                    {{ Form::hidden('lessor_id', $property->lessor->id) }}

                    <!-- Renta actual -->
                    @if($property->currentRent()->exists())
                    <div class="form-group">
                        <label class="col-md-4 control-label">Renta actual</label>
                        <div class="col-md-6">
                            <span class="form-control">{{ $property->currentRent->tenant->fullName() }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Inquilino -->
                    <div class="form-group">
                        {{ Form::label('tenant_id', 'Inquilino', ['class' => 'control-label col-md-4']) }}
                        <div class="col-md-6">
                            {{ Form::select('tenant_id', $tenants->pluck('full_name', 'id'),
                                null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- Fecha de expiracion -->
                    <div class="form-group">
                        {{ Form::label('expires', 'Fecha de Expiración', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::date('expires', null, ['class' => 'form-control', 'format' => 'Y-m-d']) }}
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
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
