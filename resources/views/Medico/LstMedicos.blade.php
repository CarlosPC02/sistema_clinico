@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Listado de Medicos de Institucion</h6>
</div>

<div class="container-fluid marco_trabajo">
	<div>
		<a href="{{ route('medico.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-plus-circle"></span> Registrar</a>
	</div>

<!-- 	<div class="panel-heading">
		{{-- {!! Form::open(['route'=>'persona\search','method'=>'post','class'=>'form-inline']) !!}
			<div class="form-group">
				<label for="buscar">Buscar</label>
				<input type="text" class="form-control" name="nombre">
				<button type="submit" class="btn btn-info">Buscar</button>
			</div>
		{!! Form::close() !!} --}}
	</div> -->

	<div class="table-responsive">
		<table class="table table-bordered table-condensed tabla_small">
			<thead>
				<th>Nombre</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Especialidad</th>
				<th>Matricula MS</th>
				<th>Matricula CM</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($medicos as $medico)
				<tr>
					<td>{{ $medico-> nombre}}</td>
					<td>{{ $medico-> ap_paterno}}</td>
					<td>{{ $medico-> ap_materno}}</td>
					<td>{{ $medico-> codigo_especialidad}}</td>
					<td>{{ $medico-> matricula_min_salud}}</td>
					<td>{{ $medico-> matricula_col_medico}}</td>
					<td><a href="#" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
						<a href="#" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
					</td>
					<!--<td><a href=""> [Editar] </a></td>
					<td><a href=""> [Trabajar] </a></td>-->
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
	
@endsection