@extends('landlords.index')

@section('content_tenants')
<div class="col-lg-12">
    <h1>Panel de acction de la aplicacion</h1>
    <p><b>Aqui iria en si el contenido de la apliación.</b></p>
    <p>Esta app tiene un menu al costado derecho. <br><br> El menu aparece cerrado en pantallas pequeñas y aborto en pantallas grandes. <br><br> Para abrir o cerrarlo, puedes usar el boton de arriba.</p>
    <p>Manten todo el contenido dentro de el div <code>#page-content-wrapper</code>.</p>
    <br><br>
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
</div>
@endsection
