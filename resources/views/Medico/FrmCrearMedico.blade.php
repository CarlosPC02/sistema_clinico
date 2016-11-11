@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Completar datos MEDICO para: <strong>{{ session('nombre_persona') }}</strong></h6>
</div>

<div class="container-fluid marco_trabajo">
	
	{!! Form::open(['route'=>'medico.store','method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::hidden('id_persona',$id_persona,['id'=>'id_persona','class'=>'form-control','placeholder'=>'Id_persona']) !!}
		</div>

		<div class="form-group">
			{!! Form::hidden('codigo_institucion',$institucion,['id'=>'codigo_institucion','class'=>'form-control','placeholder'=>'Institucion']) !!}
		</div>

		{{-- <div class="form-group">
			{!! Form::label('Especialidadcita') !!}
			{!! Form::select('codigo_especialidad',$especialidad,null,['id'=>'codigo_especialidad','class'=>'form-control']) !!}
		</div> --}}

		<label class="form-group">Especialidad</label>
	    <div class="form-group">
            <select data-toggle="select" class="form-control select select-primary select-sm" id="codigo_especialidad" name="codigo_especialidad">
            	<option value="0">Elija Especialidad</option>
            	@foreach ($especialidades as $especialidad)
                    <option value="{{ $especialidad->codigo_dominio }}">{{ $especialidad->descripcion }}</option>
                 @endforeach
            </select>
	    </div>

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Matricula MS</span>
				{!! Form::text('matricula_min_salud',null,['id'=>'matricula_min_salud','class'=>'form-control','placeholder'=>'Matricula MS']) !!}
			</div>
		</div>				

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Matricula CM</span>
				{!! Form::text('matricula_col_medico',null,['id'=>'matricula_col_medico','class'=>'form-control','placeholder'=>'Matricula CM']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Ranking</span>
				{!! Form::number('ranking',null,['id'=>'ranking','class'=>'form-control','placeholder'=>'Ranking del Medico']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Alma Mater</span>
				{!! Form::text('alma_mater',null,['id'=>'alma_mater','class'=>'form-control','placeholder'=>'Alma Mater']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
		</div>

		{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!}
	{!! Form::close() !!}
</div>
	
@endsection