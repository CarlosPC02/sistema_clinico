{{ csrf_field() }}
@extends('layouts.paracelso')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Editar seguro</h6>
</div>

<div class="container-fluid marco_trabajo">

    {!! Form::model($seguro,['route'=>['seguro.update',$seguro-> id_seguro], 'method'=>'put']) !!}

	<div class="form-group">
		<div class="input-group input-group-sm" style="margin-top: 10px; margin-bottom: -10px;">
			<span class="input-group-addon">Tipo Seguro</span>
            {!! Form::text('tipo_seguro',$seguro-> tipo_seguro,['id'=>'tipo_seguro','class'=>'form-control','placeholder'=>'Tipo seguro']) !!}
		</div>
	</div>				

	<div class="form-group">
		<div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
			<span class="input-group-addon">Nombre</span>
			{!! Form::text('nombre',$seguro-> nombre,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
	</div>
	<div class="form-group">
		{!! Form::hidden('id_seguro',$seguro-> id_seguro,['id'=>'id_seguro','class'=>'form-control','placeholder'=>'id_seguro']) !!}
	</div>

	{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary boton_inferior btn-sm m-t-10']) !!}
	{!! Form::close() !!}

</div>

@endsection