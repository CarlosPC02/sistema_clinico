@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Busqueda y listado de personas <span style="float: right; font-weight: x-small;">Cod: {{ $codigo }}</span></h6>
</div>
	
<meta name="csrf-token" content="{{csrf_token()}}"/>

<div class="container-fluid marco_trabajo">

	<div>
		<a href="{{ route('persona.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-user"></span> Nuevo Paciente</a>
	</div>

<div class="panel panel-default" style="border-radius: 10px;">
	<div class="panel-heading" style="padding-bottom: 0px; padding-top: 1px; margin-bottom: -1px; border-radius: 10px">
		<h6><strong>Buscar persona</strong></h6>
	</div>
	<div class="panel-body" style="margin-bottom: -20px;">

		{!! Form::open() !!}	
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

			<input type="hidden" name="codigo" value="{{ $codigo }}" id="codigo">

			<div class="form-group col-md-3" style="margin-left: -20px;">
				{{-- onkeydown="convertiramayusculas()" onkeyup="convertiramayusculas()" --}}
				<div class="input-group input-group-sm">
					<span class="input-group-addon">Nombre</span>
					{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>
			</div>

			<div class="form-group col-md-3" style="margin-left: -20px;">
				<div class="input-group input-group-sm">
					<span class="input-group-addon">Ap Paterno</span>
					{!! Form::text('apellido_paterno',null,['id'=>'apellido_paterno','class'=>'form-control','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>
			</div>				

			<div class="form-group col-md-3" style="margin-left: -20px;">
				<div class="input-group input-group-sm">
					<span class="input-group-addon">Ap Materno</span>
					{!! Form::text('apellido_materno',null,['id'=>'apellido_materno','class'=>'form-control','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>
			</div>

			<div class="form-group col-md-3">
                <button id="botonBuscarPersonas" type="button" class="btn btn-primary" style="padding-top: 5px; padding-bottom: 5px; width: 150px; margin-left: -20px;"><span class="fui-search"></span> Buscar </button>
            </div>

		{!! Form::close() !!}

		{{ csrf_field() }}

        <div class="container-fluid" id="resultadobusqueda" style="margin-left: -5px; margin-right: -40px;">
        	<!--RESULTADO DE LA BUSQUEDA lstpersonsa.blade.php --> 
    	</div>

	</div>

	{{-- <script type="text/javascript" src="{{asset('js/BusquedaPersona.js')}}"></script> --}}

	</div>
</div>

@endsection
