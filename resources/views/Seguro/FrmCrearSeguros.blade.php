{{ csrf_field() }}
@extends('layouts.paracelso')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Creacion de nuevo seguro</h6>
</div>

<div class="container-fluid marco_trabajo">
	{!! Form::open(['route'=>'seguro.store','method'=>'POST']) !!}

	<div class="form-group">
		<div class="input-group input-group-sm" style="margin-top: 10px; margin-bottom: -10px;">
			<span class="input-group-addon">Tipo Seguro</span>
			{!! Form::text('tipo_seguro',null,['id'=>'tipo_seguro','class'=>'form-control','placeholder'=>'Tipo seguro', 'required'=>'required']) !!}
		</div>
	</div>				

	<div class="form-group">
		<div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
			<span class="input-group-addon">Nombre</span>
			{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre', 'required'=>'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
	</div>

	{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary boton_inferior btn-sm m-t-10']) !!}
	{!! Form::close() !!}
</div>

@endsection