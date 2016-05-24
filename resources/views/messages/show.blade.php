@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Mensaje</div>
			<div class="panel-body">
				<h1>Asunto</h1>
				<p>
					<table width="550" height="80">
						<tbody>
							<tr>
								<td>De:</td>
								<td>Carlos Alavares</td>
								<td>Propiedad:</td>
								<td>Los alvares</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td>ghdf@safsd.cas</td>
								<td>Departamento:</td>
								<td>#52</td>
							</tr>
							<tr>
								<td>Enviado:</td>
								<td>6/04/2015 62:41:00</td>
								<td>Direccion:</td>
								<td>Av. Centro</td>
							</tr>
						</tbody>
					</table>
				</p>
				<div class="well">
					<p>
						................
					</p>
				</div>
				<a type="button" href="{{ route('messages.create') }}" class="btn btn-primary pull-right">Responder</a>
			</div>
		</div>
	</div>
</div>
@endsection
