@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Rentar</strong> {{ $property->title }}</div>
            <div class="panel-body">
                {{ Form::open(['route' => ['properties.post_rent', $property->id], 'class' => 'form-horizontal']) }}
                    <input type="hidden" name="lessor_id" value="{{ Auth::id() }}">
                    
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
