@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Cancelar Cita Para: </h6>

   <h4><b>{{ $cita->nombre }} {{ $cita->ap_paterno }} {{ $cita->ap_materno }}</b></h4>
</div>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>Desea...</h5>
		</div>
		<div class="panel-body">
			<a href="{{ url('/ConfirmaCancelacion',$idc) }}" class="btn btn-danger">Confirmar Cancelacion</a>
			<a href="{{ route('cita.index') }}" class="btn btn-success">Regresar a la Agenda</a>
		</div>
	</div>
</div>

@endsection