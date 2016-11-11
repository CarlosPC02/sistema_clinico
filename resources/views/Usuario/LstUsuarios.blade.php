@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Listado de usuarios</h6>
</div>

<div class="container-fluid marco_trabajo">

	<div>
		<a href="{{ route('usuario.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-plus-circle"></span> Registrar</a>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-condensed tabla_small">
			<thead>
				{{-- <th>#</th> --}}
				<th>username</th>
				<th>password</th>
				<th>email</th>
				<th>institucion</th>
				{{-- <th>Direccion</th>
				<th>Estado</th> --}}
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
				<tr>
					{{-- <td>{{ $persona-> id_persona}}</td> --}}
					<td>{{ $usuario-> name}}</td>
					<td>{{ $usuario-> password}}</td>
					<td>{{ $usuario-> email}}</td>
					<td>{{ $usuario-> codigo_institucion}}</td>
					<td><a href="#" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
						<a href="#" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection