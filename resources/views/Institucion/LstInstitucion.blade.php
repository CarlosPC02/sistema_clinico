@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Listado de Instituciones</h6>
</div>

<div class="container-fluid marco_trabajo">

	<div>
		<a href="{{ route('institucion.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-plus-circle"></span> Registrar</a>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-condensed tabla_small">
			<thead>
				<th>#</th>
				<th>Codigo</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Direccion</th>
				<th>Estado</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($instituciones as $institucion)
				<tr>
					<td>{{ $institucion-> id_institucion}}</td>
					<td>{{ $institucion-> codigo_institucion}}</td>
					<td>{{ $institucion-> tipo_institucion}}</td>
					<td>{{ $institucion-> nombre}}</td>
					<td>{{ $institucion-> descripcion}}</td>
					<td>{{ $institucion-> direccion}}</td>
					<td>{{ $institucion-> estado}}</td>
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