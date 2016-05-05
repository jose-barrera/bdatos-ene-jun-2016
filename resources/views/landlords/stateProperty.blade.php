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

						<!-- Filtrar por -->
						<div class="input-group-btn search-panel">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span id="search_concept">Filtar por</span> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#Inquilino">Ciudad</a></li>
								<li><a href="#Inquilino">Codigo Postal</a></li>
								<li><a href="#Inquilino">Dirección</a></li>
								<li class="divider"></li>
								<li><a href="#Arrendatario">Arrendatario</a></li>
								<li><a href="#Inquilino">Inquilino</a></li>
							</ul>
						</div>
						<!-- /Filtrar por-->


						<input type="hidden" name="search_param" value="all" id="search_param">
						<input type="text" class="form-control" name="x" placeholder="Buscar propiedad">

						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Search Bar -->


	<!-- Los resultados de la busqueda deberan mostrarse alimentando una tabla como esta asi. -->


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
							<th>Id</th>
							<th>Alias</th>
							<th>Descripción</th>
							<th>Ciudad</th>
							<th>CP</th>
							<th>Status</th>
							<th>Arrendador</th>
							<th>Inquilino</th>
						</tr>
					</thead>
					<!-- /cabeza de la tabla de propiedades -->

					<!-- relleno de la tabla de propiedades -->
					<tbody>

						<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
							<td>
								<button class="btn btn-default btn-md"><span class="glyphicon glyphicon-chevron-down"></span></button>
							</td>
							<td>Casa Azul Altabrisa</td>
							<td>Casa al costado del cumbres</td>
							<td>Merida</td>
							<td>97000</td>
							<td>Rentada</td>
							<td>Beyonce</td>
							<td>David Bisbal</td>
						</tr>

						<tr>
							<td colspan="12" class="hiddenRow">
								<div class="accordian-body collapse" id="demo1">
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
						</tbody>
						<!-- /cabeza de la tabla de propiedades -->
					</table>
				</div>

			</div>
			<!-- /Tabla de propiedades -->

		</div>
		<!-- /contenedor de la tabla de propiedades -->
		<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
	</div>
	@endsection
