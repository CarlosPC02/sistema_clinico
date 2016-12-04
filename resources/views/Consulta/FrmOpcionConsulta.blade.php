@extends('layouts.paracelso')

@section('content')
<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Consulta ya existe para la fecha: {{ $fecha }}</h6>
</div>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>Desea...</h5>
		</div>
		<div class="panel-body">
			<a href="{{ route('consulta.create') }}" class="btn btn-success">Crear una Nueva Consulta</a>
			<a href="{{ route('consulta.edit',$idc) }}" class="btn btn-warning">Editar la Consulta</a>
		</div>
	</div>
</div>

<!-- Fin de Titulo -->
@endsection