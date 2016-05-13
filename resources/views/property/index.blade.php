@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="clearfix separator" style="margin: 15px"></div>
            <!-- contenedor de la tabla de propiedades -->
            <div class="container">
                <!-- break line to separate elements using bootstrap-->
                <div class="clearfix separator" style="margin: 15px"></div>
                <!-- Tabla de propiedades -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <table class="table table-condensed" style="border-collapse:collapse;">
                            <!-- cabeza de la tabla de propiedades -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Alias</th>
                                    <th>Descripción</th>
                                    <th>Dirección</th>
                                    <th>CP</th>
                                    <th>Arrendador</th>
                                    <th>Inquilino</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <!-- /cabeza de la tabla de propiedades -->

                            <!-- relleno de la tabla de propiedades -->
                            <tbody>
                            	@foreach($properties as $property)
                                <tr data-toggle="collapse" data-target="#property-{{ $property->id }}" class="accordion-toggle">
                                    <td>
                                        <button class="btn btn-default btn-md"><span class="glyphicon glyphicon-chevron-down"></span></button>
                                    </td>
                                    <td>{{ $property->title }}</td>
                                    <td>{{ substr($property->description, 0, 50) }}</td>
                                    <td>{{ $property->address }}</td>
                                    <td>{{ $property->postal_code }}</td>
                                    <td>{{ $property->lessor->fullName() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="property-{{ $property->id }}">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <td><b>Dirección:</b></td>
                                                        <td>Calle ficcticia</td>
                                                        <td><b>Numero:</b></td>
                                                        <td>Graham's number</td>
                                                        <td>
                                                            <a href="#" class="btn btn-default btn-md">
                                                                <i class="glyphicon glyphicon-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
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
            <!-- /contenedor de la tabla de propiedades -->
        </div>
    </div>
@endsection
