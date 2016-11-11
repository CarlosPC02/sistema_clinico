@extends('layouts.paracelso')
@section('content')
	
<meta name="csrf-token" content="{{csrf_token()}}"/>

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Agenda de Citas</h6>
</div>

<div class="container-fluid marco_trabajo">

	<div>
		<a href="{{ route('cita.create') }}" class="btn btn-primary boton_superior_registro"><span class="fui-plus-circle"></span> Registrar Nueva</a>
	</div>

	<div class="panel panel-default" style="border-radius: 10px;">
		<div class="panel-heading" style="padding-bottom: 0px; padding-top: 1px; margin-bottom: -1px; border-radius: 10px">
		<h6><strong>Buscar Cita</strong></h6>
	</div>

	<div class="panel-body">

		{!! Form::open() !!}	
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<div class="container-fluid">
			
			<div class="form-group col-md-3" style="margin-left: -40px;">
                <!-- <label for="dtp_input2" class="control-label">Fecha</label> -->
                <div class="input-group input-group-sm date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                	<span class="input-group-addon" style="max-width: 50px;">Fecha</span>
                    <input class="form-control" size="15" type="text" value="" readonly>
                    <span class="input-group-addon" style="max-width: 32px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon" style="max-width: 32px;"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>

			<div class="form-group col-md-3" style="margin-left: -40px;">
                <!-- <label for="dtp_input3" class="control-label">Hora</label> -->
                <div class="input-group input-group-sm date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                	<span class="input-group-addon" style="max-width: 50px;">Hora</span>
                    <input class="form-control" size="15" type="text" value="" readonly>
                    <span class="input-group-addon" style="max-width: 32px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon" style="max-width: 32px;"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>			

			{{-- <div class="form-group col-md-3">
				{!! Form::text('medico',null,['id'=>'medico','class'=>'form-control','placeholder'=>'Apellido Medico']) !!}
			</div> --}}

			<!-- <label class="form-group col-md-3">Medico</label> -->
	        <div class="selectContainer col-md-4" style="max-width: 300px; margin-left: -20px;">
	            <select class="form-control input-sm" id="id_medico" name="id_medico">
	            	<option value="">Elija Medico</option>
	            	@foreach ($medicos as $medico)
                        <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->apellido_paterno." ".$medico->apellido_materno}}</option>
                     @endforeach
	            </select>
	        </div>

	        <div class="form-group col-md-3">
                <button id="botonBuscarCitas" type="button" class="btn btn-primary" style="padding-top: 5px; padding-bottom: 5px; width: 150px; margin-left: -20px;"><span class="fui-search"></span> Buscar </button>
            </div>
		</div>				

		{!! Form::close() !!}

		{{ csrf_field() }}

        <div class="container-fluid" id="resultadoBusquedaCita">
        	<div class="panel-heading">
			    <center><b>CITAS PARA : {{ $fecha }}</b></center>
			</div>

        	<div class="table-responsive">
			        <table class="table table-bordered table-condensed tabla_small">
			            <thead>
			                    <th>Institucion</th>
			                    <th>Fecha</th>
			                    <th>Hora</th>
			                    <th>Nombre</th>
			                    <th>Paterno</th>
			                    <th>Motivo</th>
			                    <th>Medico</th>
			                    <th>Opciones</th>
			                </thead>
			            <tbody>
			                    @foreach($citas as $cita)
			                    <tr>
			                        <td>{{ $cita-> codigo_institucion }}</td>
			                        <td>{{ $cita-> fecha}}</td>
			                        <td>{{ $cita-> hora}}</td>
			                        <td>{{ $cita-> nombre}}</td>
			                        <td>{{ $cita-> ap_paterno}}</td>
			                        <td>{{ $cita-> motivo}}</td>
			                        <td> {{ $cita->nombrem }} {{ $cita->apellidom }}</td>
			                        <td><a href="#" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
										<a href="#" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
									</td>
			                    </tr>
			                    @endforeach
			                </tbody>
			        </table>
			</div>
    	</div>

		</div>

		{{-- <script type="text/javascript" src="{{asset('js/BusquedaPersona.js')}}"></script> --}}

	</div>
</div>

	

@endsection