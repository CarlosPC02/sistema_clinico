@extends ('layouts.paracelso')

@section('title','Signos Vitales')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Signos Vitales</h6>
</div>
<!-- Fin de Titulo -->

<div class="container-fluid marco_trabajo">

	<div>@include('Persona.LstDatosBasicos')</div>

	<!-- Signos Vitales -->
	<!-- Tabpanels de signos vitales -->
	<div class="container-fluid paciente_encontrado">
	<div role="tabpanel">
		<!--crea boton de menu al estrecharse la resolucion de pantalla-->
		<div class="navbar-header navbar-default">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		</div>
		
		<!--incluye el menu en la referencia del boton creado antes-->
		<div class="collapse navbar-collapse marco_tabs" id="menu" role="navigation">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active" role="presentation"><a href="#tab1" aria-controls="" data-toggle="tab" role="tab">Signos Vitales</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="" data-toggle="tab" role="tab">Grafica</a></li>
			</ul>
		</div>

		<div class="tab-content">

		<div role="tabpanel" class="tab-pane active" id="tab1">
			<div class="container-fluid marco_trabajo_paciente">
<!-- 
			<h5>Fecha Actual: {{ $fecha_actual }}</h5>
 -->			<div class="table-responsive">
				<table class="table table-bordered table-condensed tabla_small">
					<thead>
						<th>Fecha</th>
						<th>Peso</th>
						<th>Talla</th>
						<th>IMC</th>
						<th>P.Sist.</th>
						<th>P.Diast.</th>
						<th>F.Card</th>
						<th>F.Resp</th>
						<th>Temp °C</th>
						<th>SPO2</th>
						<th>Dolor</th>
						<th>Obs</th>
					</thead>
					<tbody>
						@foreach($mediciones as $medicion)
						<tr>
							<td>{{ $medicion-> fecha}}</td>
							<td>{{ $medicion-> peso}}</td>
							<td>{{ $medicion-> estatura}}</td>
							<td>{{ $medicion-> imc}}</td>
							<td>{{ $medicion-> presion_sistolica}}</td>
							<td>{{ $medicion-> presion_diastolica}}</td>
							<td>{{ $medicion-> frecuencia_cardiaca}}</td>
							<td>{{ $medicion-> frecuencia_respiratoria}}</td>
							<td>{{ $medicion-> temperatura}}</td>
							<td>{{ $medicion-> spo2}}</td>
							<td>{{ $medicion-> dolor}}</td>
							<td>{{ $medicion-> observaciones}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>

				<!-- Boton de Registro de nuevos signos vitales -->
				<a href="#signos" data-toggle="modal" class="btn btn-primary">Registrar Signos Vitales</a>

			</div>
		</div>

		<!--seccion de signos historicos-->
		<div class="tab-pane" id="tab2" role="tabpanel">
			<div class="container-fluid marco_trabajo_paciente">
				<h5>Grafica de trabajo</h5>
				<div id="curve_chart" style="width: 1024px; height: 500px"></div>
			</div>
		</div>

		</div>
		</div>
	</div>

	<!--Modales-->
	<!--modal para signos vitales-->
	<div class="modal fade" id="signos" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h5 class="modal-title">Registrar Signos Vitales</h5>
				</div>
				<div class="modal-body">
				<!--Formulario de Registro de Signos Vitales-->
				{!! Form::open(['route'=>'medicion.store','method'=>'POST']) !!}
				
					
					<div class="form-group">
						{!! Form::hidden('id_persona',session('id_persona'),['id'=>'id_persona']) !!}
					</div>

		            <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-bottom: -10px;">
				            <span class="input-group-addon">Fecha Toma</span>
				            {!! Form::text('fecha',$fecha_actual,['id'=>'fecha','class'=>'form-control','placeholder'=>'Fecha','value'=>'$fecha_actual']) !!}

				            <!-- <input id="fecha" type="date" name="fecha" value={{ $fecha_actual }} class="form-control" placeholder="Fecha toma" autocomplete="off" autofocus> -->
				        </div>
				    </div>

				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">Peso</span>
				            {!! Form::text('peso',null,['id'=>'peso','step'=>'any','min'=>'0.4','max'=>'170.999', 'class'=>'form-control','placeholder'=>'Peso en Kg (p.ej.: 81.275)']) !!}
				            <!-- <input id="peso" type="number" step="any" name="peso" class="form-control" placeholder="Peso en kg (p.ej.: 81,20)" autocomplete="off" autofocus> -->
				        </div>
				    </div>

				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">Talla</span>
				            {!! Form::text('estatura',null,['id'=>'estatura','step'=>'any','min'=>'0.1','max'=>'220.99', 'class'=>'form-control','placeholder'=>'Talla en cm (p.ej.: 159.85)']) !!}
				            <!-- <input id="estatura" type="number" step="any" name="estatura" class="form-control" placeholder="Talla en cm (p.ej.: 159)" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">IMC</span>
				            {!! Form::text('imc',null,['id'=>'imc','min'=>'0','max'=>'150', 'class'=>'form-control','placeholder'=>'Indice Masa Corporal']) !!}
				            <!-- <input id="imc" type="number" name="imc" class="form-control" placeholder="Indice Masa Corporal" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">P. Sistolica</span>
				            {!! Form::text('presion_sistolica', null,['id'=>'presion_sistolica','min'=>'40','max'=>'280', 'class'=>'form-control','value' => null,'placeholder'=>'Presion Sistolica']) !!}
				            <!-- <input id="presion_sistolica" type="number" name="presion_sistolica" class="form-control" placeholder="Presion Sistólica" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">P. Diastolica</span>
				            {!! Form::text('presion_diastolica',null,['id'=>'presion_diastolica','min'=>'40','max'=>'280', 'class'=>'form-control','placeholder'=>'Presion Diastolica']) !!}
				            <!-- <input id="presion_diastolica" type="number" name="presion_diastolica" class="form-control" placeholder="Presion Diastólica" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">F. Cardiaca</span>
				            {!! Form::number('frecuencia_cardiaca',null,['id'=>'frecuencia_cardiaca','min'=>'0','max'=>'300', 'class'=>'form-control','value' => null,'placeholder'=>'Frecuencia Cardiaca']) !!}
				            <!-- <input id="frecuencia_cardiaca" type="number" name="frecuencia_cardiaca" class="form-control" placeholder="Frecuencia Cardíaca" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">F. Respiratoria</span>
				            {!! Form::number('frecuencia_respiratoria',null,['id'=>'frecuencia_respiratoria','min'=>'0','max'=>'120', 'class'=>'form-control','value' => null,'placeholder'=>'Frecuencia Respiratoria']) !!}
				            <!-- <input id="frecuencia_respiratoria" type="number" name="frecuencia_respiratoria" class="form-control" placeholder="Frecuencia Respiratoria" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">Temp. (°C)</span>
				            {!! Form::number('temperatura',null,['id'=>'temperatura','min'=>'0.0','max'=>'45.9', 'class'=>'form-control','value' => null,'placeholder'=>'Temperatura']) !!}
				            <!-- <input id="temperatura" type="number" name="temperatura" class="form-control" placeholder="Temperatura en °C (p.ej.: 38,2)" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">SPO2(%)</span>
				            {!! Form::number('spo2',null,['id'=>'spo2','min'=>'0','max'=>'45', 'class'=>'form-control','value' => null,'placeholder'=>'spo2']) !!}
				            <!-- <input id="spo2" type="number" name="spo2" class="form-control" placeholder="SPO2" autocomplete="off" autofocus> -->
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">Dolor(1-10)</span>
				            {!! Form::number('dolor',null,['id'=>'dolor','min'=>'0','max'=>'10', 'class'=>'form-control','value' => null,'placeholder'=>'dolor']) !!}
				            <!-- <input id="dolor" type="number" name="dolor" class="form-control" placeholder="Nivel Dolor" autocomplete="off" autofocus> -->
				        </div>
				    </div>

				    <div class="form-group">
				        <div class="input-group input-group-sm" style="margin-top: -10px; margin-bottom: -10px;">
				            <span class="input-group-addon">Observaciones</span>
				            {!! Form::text('observaciones',null,['id'=>'observaciones','class'=>'form-control','value' => null,'placeholder'=>'observaciones']) !!}
				            <!-- <input id="observaciones" type="text" name="observaciones" class="form-control" placeholder="Observaciones" autocomplete="off" autofocus> -->
				        </div>
				    </div>

				    <div class="form-group">
						<div class="input-group input-group-sm">
				            <input id="estado" type="hidden" name="estado" class="form-control" value="AC">
				        </div>
					</div>
					<!-- </form> -->
					{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary btn-sm']) !!}

					{!! Form::close() !!}
					<!-- Fin de formulario de registro de signos vitales -->
				</div>
			</div>
		</div>
	</div>

</div>

@endsection