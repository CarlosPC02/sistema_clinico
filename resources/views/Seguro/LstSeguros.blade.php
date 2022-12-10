{{ csrf_field() }}
@extends('layouts.paracelso')
@section('content')

<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Listado de Seguros</h6>
</div>

<div class="container-fluid marco_trabajo">

	<div>
		<a href="{{ route('seguro.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-plus-circle"></span> Registrar</a>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-condensed tabla_small">
			<thead>
				<th>#</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Estado</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($seguros as $seguro)
				<tr>
					<td>{{ $seguro-> id_seguro}}</td>
					<td>{{ $seguro-> tipo_seguro}}</td>
					<td>{{ $seguro-> nombre}}</td>
					<td>{{ $seguro-> estado}}</td>
					<td><a href="seguro/editar/{{ $seguro-> id_seguro}}" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
					<a href="seguro/eliminar/{{ $seguro-> id_seguro}}" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
@endsection