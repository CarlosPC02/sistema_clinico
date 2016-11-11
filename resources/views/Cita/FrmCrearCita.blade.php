@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Crear Cita Para: </h6>
</div>

<div class="container-fluid marco_trabajo">

	<div>@include('Persona.LstDatosBasicos')</div>

	{!! Form::open(['route'=>'cita.store','method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::hidden('id_persona',session('id_persona'),['id'=>'id_persona','class'=>'form-control','placeholder'=>'Id_persona']) !!}
		</div>

		<label class="form-group">Medico</label>
        <div class="selectContainer">
            <select class="form-control" id="id_medico" name="id_medico">
            	@foreach ($medicos as $medico)
                    <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->ap_paterno." ".$medico->ap_materno}}</option>
                 @endforeach
            </select>
        </div>

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Consultorio</span>
				{!! Form::text('id_consultorio',null,['id'=>'id_consultorio','class'=>'form-control','placeholder'=>'Consultorio']) !!}
			</div>	
		</div>

		<div class="form-group">
			{!! Form::hidden('codigo_institucion',$codigo,['id'=>'codigo_institucion','class'=>'form-control','placeholder'=>'Id_persona']) !!}
		</div>				

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Motivo</span>
				{!! Form::text('motivo',null,['id'=>'motivo','class'=>'form-control','placeholder'=>'Motivo de la Cita']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Historia</span>
				{!! Form::text('historia',null,['id'=>'historia','class'=>'form-control','placeholder'=>'Historia']) !!}
			</div>
		</div>

		<div class="form-group">
<!--             <label for="fecha" class="control-label">Fecha</label> -->
            <div class="input-group input-group-sm date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="fecha" data-link-format="yyyy-mm-dd">
            	<span class="input-group-addon">Fecha</span>
                <input class="form-control" size="16" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
			<input type="hidden" name="fecha" id="fecha" value="" /><br/>
        </div>

		<div class="form-group">
            <label for="hora" class="control-label">Hora</label>
            <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="hora" data-link-format="hh:ii">
                <input class="form-control" size="16" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
			<input type="hidden" name="hora" id="hora" value="" /><br/>
        </div>

		<div class="form-group">
			{!! Form::hidden('estado','TCEP',['id'=>'estado','class'=>'form-control','placeholder'=>'Id_persona']) !!}
		</div>

		
		{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!}

	{!! Form::close() !!}
</div>

@endsection