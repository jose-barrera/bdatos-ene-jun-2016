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
                    <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Roles</label>

                        <div class="col-md-6">
                            @foreach(App\Models\UserRole::all() as $role)
                                <input type="checkbox" name="roles" id="roles-{{ $role->id }}" value="{{ $role->id }}">
                                <label for="roles[{{ $role->id }}]">{{ ucfirst($role->key) }}</label>
                            @endforeach

                            @if ($errors->has('roles'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('roles') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

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
