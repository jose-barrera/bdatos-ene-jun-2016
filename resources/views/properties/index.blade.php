@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <!-- break line to separate elements using bootstrap-->
            <div class="clearfix separator" style="margin: 15px"></div>

            <!-- Tabla de propiedades -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title">Propiedades</span>
                        <a href="{{ route('properties.create') }}" class="btn btn-primary btn-xs pull-right">
                            <span class="glyphicon glyphicon-plus"></span> Nueva propiedad
                        </a>
                    </div>
                    <table class="table" style="border-collapse:collapse;">
                        <!-- cabeza de la tabla de propiedades -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Alias</th>
                                <th>Arrendador</th>
                                <th>Rentada</th>
                            </tr>
                        </thead>
                        <!-- /cabeza de la tabla de propiedades -->

                        <!-- relleno de la tabla de propiedades -->
                        <tbody>
                            @foreach($properties as $property)
                            @define $rented = $property->currentRent()->exists();
                            <tr>
                                <td>
                                    <button data-toggle="collapse" data-target="#property-{{ $property->id }}"
                                            type="button" class="accordion-toggle btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-triangle-bottom"></span>
                                    </button>
                                </td>
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->lessor->fullName() }}</td>
                                <td>{{ $rented ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr class="accordian-body collapse" id="property-{{ $property->id }}">
                                <td colspan="5">
                                    <!-- Detalle de la propiedad -->
                                    <dl class="dl-horizontal">
                                        <dt>Dirección</dt>
                                        <dd>{{ $property->address }}</dd>

                                        <dt>Descripción</dt>
                                        <dd>{{ $property->description }}</dd>

                                        @if($rented)
                                        @define $tenant = $property->currentRent->tenant
                                        <dt>Inquilino</dt>
                                        <dd><a href="{{ route('users.show', ['id' => $tenant->id]) }}">
                                            {{ $tenant->fullName() }}
                                        </a></dd>
                                        @endif

                                        @if($property->propertyGroup()->exists())
                                        <dt>Grupo de propiedades</dt>
                                        <dd>{{ $property->propertyGroup->description }}</dd>
                                        @endif
                                    </dl>

                                    <!-- Acciones -->
                                    @if($property->lessor->id === Auth::id())
                                        @if($rented)
                                        <a onclick="if (confirm('Eliminar renta?')) $('#delete-rent-{{ $property->id }}').submit();"
                                                class="btn btn-warning">
                                            <span class="glyphicon glyphicon-trash"></span> Eliminar renta
                                        </a>
                                        @else
                                        <a href="{{ route('properties.get_rent', ['id' => $property->id]) }}"
                                                class="btn btn-primary">Rentar</a>
                                        @endif
                                        <div class="btn-group">
                                            <a href="{{ route('properties.edit', ['id' => $property->id]) }}"
                                                    class="btn btn-default">
                                                <span class="glyphicon glyphicon-pencil"></span> Editar propiedad
                                            </a>
                                            <a onclick="if (confirm('Eliminar propiedad?')) $('#delete-property-{{ $property->id }}').submit();"
                                                    class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span> Eliminar propiedad
                                            </a>
                                        </div>

                                        <!-- Forma oculta para borrar la renta -->
                                        @if($rented)
                                        {{ Form::open(['route' => ['properties.delete_rent', $property->id],
                                            'method' => 'delete', 'id' => 'delete-rent-'.$property->id,
                                            'style' => 'display: hidden;']) }}
                                        {{ Form::close() }}
                                        @endif

                                        <!-- Forma oculta para borrar la propiedad -->
                                        {{ Form::open(['route' => ['properties.destroy', 'id' => $property->id],
                                            'method' => 'delete', 'id' => 'delete-property-'.$property->id,
                                            'style' => 'display: hidden;']) }}
                                        {{ Form::close() }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- /cabeza de la tabla de propiedades -->
                    </table>
                </div>
            </div>
            <!-- /Tabla de propiedades -->
        </div>
    </div>
@endsection
