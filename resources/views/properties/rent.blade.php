@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Rentar</strong> {{ $property->title }}</div>
            <div class="panel-body">
                {{ Form::model($property->currentRent, ['route' => ['properties.post_rent', $property->id], 'class' => 'form-horizontal']) }}

                    <!-- Arrendador -->
                    <input type="hidden" name="lessor_id" value="{{ Auth::id() }}">
                    @if($errors->has('lessor_id'))
                    <div class="form-group has-error">
                        <label class="col-md-4 control-label">Arrendador</label>
                        <div class="col-md-6">
                            <span class="help-block">
                                <strong>{{ $errors->first('lessor_id') }}</strong>
                            </span>
                        </div>
                    </div>
                    @endif

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
                    <div class="form-group{{ $errors->has('tenant_id') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Inquilino<span style="color: red">*</span></label>

                        <div class="col-md-6">
                            <select class="form-control" name="tenant_id">
                                <option value="">Seleccionar</option>
                                @foreach($tenants as $tenant)
                                <option value="{{ $tenant->id }}">{{ $tenant->fullName() }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('tenant_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tenant_id') }}</strong>
                            </span>
                            @endif
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
