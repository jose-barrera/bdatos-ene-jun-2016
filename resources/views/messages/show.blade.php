@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Mensaje</div>
			<div class="panel-body">
				<h1>{{ $message->subject }}</h1>
				<p>
					<table width="550" height="80">
						<tbody>
							<tr>
								<td>De:</td>
								<td>{{ $message->sender->full_name }}</td>
								<td>Propiedad:</td>
								<td>{{ $message->property->alias }}</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td>{{ $message->sender->email }}</td>
								<td>Tipo de Propiedad:</td>
								<td>{{ $message->property->type->description }}</td>
							</tr>
							<tr>
								<td>Enviado:</td>
								<td>{{ $message->created_at }}</td>
								<td>Direccion:</td>
								<td>{{ $message->property->address }}</td>
							</tr>
						</tbody>
					</table>
				</p>
				<div class="well">
					<p>{{ $message->content }}</p>
				</div>
				<a type="button" href="{{ route('messages.create').'/'.$message->sender->id }}" class="btn btn-primary pull-right">Responder</a>
			</div>
		</div>
	</div>
</div>
@endsection
