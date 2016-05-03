@extends('landlords.index')

@section('content_landlords')
<div class="col-lg-12">
   <div class="clearfix separator" style="margin: 15px"></div>

   <!-- Search Bar -->
   <div class="search-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">

                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Buscar inquilino">

                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Search Bar -->

<!-- break line to separate elements using bootstrap-->
<div class="clearfix separator" style="margin: 15px"></div>

<!-- Los resultados de la busqueda deberan mostrarse alimentando una tabla como esta asi. -->


<!-- Control de inquilinos -->
<div class="container">

    <!-- Tabla de inquilinos -->
    <div class="well">
        <table class="table">
            <thead>
                <tr>
                    <th class="glyphicon glyphicon-th-list" aria-hidden="true"></th>
                    <th>#</th>
                    <th>Nombre</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td>1</td>
                    <td>Chris</td>
                    
                </tr>

            </tbody>
        </table>
    </div>
    <!-- /Tabla de mensajes -->

    <a href="#" class="btn btn-default" id="notificacion">Enviar Notificacion</a>
    <!-- Paginacion -->
    <div style="text-align: center">
        <ul class="pagination">
            <li><a href="#">Prev.</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Sig.</a></li>
        </ul>
    </div>
    <!-- /Paginacion -->



</div>
<!-- Control de mensajes -->
<br><br>
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
</div>
@endsection
