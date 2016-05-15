@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="clearfix separator" style="margin: 15px"></div>

            <!-- break line to separate elements using bootstrap-->
            <div class="clearfix separator" style="margin: 15px"></div>
            <!-- Tabla de propiedades -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <table class="table" style="border-collapse:collapse;">
                        <!-- cabeza de la tabla de propiedades -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Alias</th>
                                <th>Descripción</th>
                                <th>Arrendador</th>
                                <th>Rentada</th>
                            </tr>
                        </thead>
                        <!-- /cabeza de la tabla de propiedades -->

                        <!-- relleno de la tabla de propiedades -->
                        <tbody>
                            @foreach($properties as $property)
                            @define $rented = $property->currentRent()->exists();
                            <tr data-toggle="collapse" data-target="#property-{{ $property->id }}" class="accordion-toggle">
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ substr($property->description, 0, 50) }}</td>
                                <td>{{ $property->lessor->fullName() }}</td>
                                <td>{{ $rented ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr class="accordian-body collapse" id="property-{{ $property->id }}">
                                <td colspan="5">
                                    <dl class="dl-horizontal">
                                        <dt>Dirección</dt>
                                        <dd>{{ $property->address }}</dd>

                                        @if($rented)
                                        @define $tenant = $property->currentRent->tenant
                                        <dt>Inquilino</dt>
                                        <dd><a href="{{ route('users.show', ['id' => $tenant->id]) }}">
                                            {{ $tenant->fullName() }}
                                        </a></dd>
                                        @endif
                                    </dl>
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
