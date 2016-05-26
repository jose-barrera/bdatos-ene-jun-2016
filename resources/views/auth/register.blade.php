@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <!-- Nombre(s) -->
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nombre(s)</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Primer apellido -->
                    <div class="form-group{{ $errors->has('first_last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Primer Apellido</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first_last_name" value="{{ old('first_last_name') }}" required>

                            @if ($errors->has('first_last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Segundo apellido -->
                    <div class="form-group{{ $errors->has('second_last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Segundo Apellido</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="second_last_name" value="{{ old('second_last_name') }}">

                            @if ($errors->has('second_last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('second_last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Genero -->
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Sexo</label>

                        <div class="col-md-6">
                            <select class="form-control" name="gender" required>
                                <option value="">Select</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Celular -->
                    <div class="form-group{{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Celular</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone') }}">

                            @if ($errors->has('mobile_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Telefono de Casa -->
                    <div class="form-group{{ $errors->has('home_phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Telefono de Casa</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="home_phone" value="{{ old('home_phone') }}">

                            @if ($errors->has('home_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('home_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Telefono de Oficina -->
                    <div class="form-group{{ $errors->has('office_phone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Telefono de Oficina</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="office_phone" value="{{ old('office_phone') }}">

                            @if ($errors->has('office_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('office_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Contraseña</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Repetir contraseña -->
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Repetir Contraseña</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Roles -->
                    <input type="hidden" name="roles" value="{{ App\Models\UserRole::where('key','tenant')->first()->id }}">

                    <!-- Boton de submit -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
