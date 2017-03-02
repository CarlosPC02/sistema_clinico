@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Consulta</h6>
</div>
<!-- Fin de Titulo -->

<div class="container-fluid marco_trabajo">

	<div>@include('Persona.LstDatosBasicos')</div>
{{-- <div id="idhistoria"></div> RECIBIA EL ID_HISTORIA PARA COMPROBAR --}}

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
			  <h4 class="panel-title">
			    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			      Datos Consulta
			    </a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
				  	{{-- {!! Form::open(['route'=>'historia.store','method'=>'POST','role'=>'form']) !!} --}}
				    {!! Form::open(['id'=>'formConsulta']) !!}

					<div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Fecha Inicio</span>
							{!! Form::text('fecha_inicio',$consulta->fecha_inicio,['id'=>'fecha_inicio','class'=>'form-control','placeholder'=>'Fecha']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Hora Inicio</span>
							{!! Form::text('hora_inicio',$consulta->hora_inicio,['id'=>'hora_inicio','class'=>'form-control','placeholder'=>'hora']) !!}
						</div>
					</div>

					<div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Consultorio</span>
							{!! Form::number('id_consultorio',$consulta->id_consultorio,['id'=>'id_consultorio','class'=>'form-control','placeholder'=>'Numero de consultorio']) !!}
						</div>
					</div>

				    <div class="form-group">
				    	<label>Medico Responsable</label>
				    	<label>Registrado: {{ $consulta->id_medico }}</label>
				        <div class="selectContainer">
				            <select class="form-control select-sm input-sm" id="id_medico" name="id_medico">
				            	@foreach ($medicos as $medico)
		                                    <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->ap_paterno." ".$medico->ap_materno}}</option>
		                         @endforeach  
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				    	<label>Tipo Consulta</label>
				    	<label>Registrada: {{ $consulta->tipo_consulta }}</label>
				        <div class="selectContainer">
				            <select class="form-control select-sm input-sm" id="tipo_consulta" name="tipo_consulta">
				            	@foreach ($tipos as $tipo)
		                            <option value="{{ $tipo->codigo_dominio }}">{{ $tipo->descripcion}}</option>
		                         @endforeach  
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 120px;">Motivo de Consulta</span>
							{!! Form::text('motivo_consulta',$consulta->motivo_consulta,['id'=>'motivo_consulta','class'=>'form-control','placeholder'=>'Motivo de Consulta']) !!}
						</div>
					</div>

					<div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 120px;">Enfermedad Actual</span>
							{!! Form::text('historia',$consulta->historia,['id'=>'historia','class'=>'form-control','placeholder'=>'Historia de la enfermedad actual']) !!}
						</div>
					</div>				    

					<div class="form-group">
						{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!} --}}
					
					{!! link_to('#','Siguiente...',['id'=>'guardar','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					<div class="form-group">
						{!! Form::hidden('id_consulta',$consulta->id_consulta,['id'=>'id_consulta','class'=>'form-control','placeholder'=>'idc']) !!}
					</div>
					{{-- <button id="mostrar" type="button">Mostrar</button> --}}
					{!! Form::close() !!}
				</div>
			</div>
		</div>	

		<div class="panel panel-default" id="Tab2">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			      Examen Fisico
			    </a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formRevision']) !!}
						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Examen Fisico General</span>
								{!! Form::text('revision_general',$revision->revision_general,['id'=>'revision_general','class'=>'form-control','placeholder'=>'Revision General']) !!}
							</div>
						</div>	
						
						<button type="button" id="mostrarP" class="btn btn-info">Examen Fisico Segmentario</button>
						<button type="button" id="ocultarP" class="btn btn-success">Ocultar</button>

						<div class="container" id="EFS">
							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Cabeza y Cuello</span>
									{!! Form::text('cabeza_cuello',$revision->cabeza_cuello,['id'=>'cabeza_cuello','class'=>'form-control','placeholder'=>'Cabeza y Cuello']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Torax</span>
									{!! Form::text('torax',$revision->torax,['id'=>'torax','class'=>'form-control','placeholder'=>'Torax']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Miembros superiores</span>
									{!! Form::text('miembros_superiores',$revision->miembros_superiores,['id'=>'miembros_superiores','class'=>'form-control','placeholder'=>'Miembros superiores']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Abdomen</span>
									{!! Form::text('abdomen',$revision->abdomen,['id'=>'abdomen','class'=>'form-control','placeholder'=>'Abdomen']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Miembros Inferiores</span>
									{!! Form::text('miembros_inferiores',$revision->miembros_inferiores,['id'=>'miembros_inferiores','class'=>'form-control','placeholder'=>'Miembros Inferiores']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Genital y Urinario</span>
									{!! Form::text('genital_urinario',$revision->genital_urinario,['id'=>'genital_urinario','class'=>'form-control','placeholder'=>'Genital y Urinario']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Neurologico</span>
									{!! Form::text('neurologico',$revision->neurologico,['id'=>'neurologico','class'=>'form-control','placeholder'=>'Neurologico']) !!}
								</div>
							</div>

							<div class="form-group">
						    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
						            <span class="input-group-addon" style="max-width: 120px;">Otros</span>
									{!! Form::text('otros',$revision->otros,['id'=>'otros','class'=>'form-control','placeholder'=>'Otros']) !!}
								</div>
							</div>
							
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoR','AC',['id'=>'estadoR','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						{!! link_to('#','Siguiente...',['id'=>'guardarR','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					{!! Form::close() !!}
				
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab3">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			      Evaluacion
			    </a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formEvaluacion']) !!}
						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Laboratorios con los que acude a esta consulta</span>
								{!! Form::text('laboratorio',$evaluacion->laboratorio,['id'=>'laboratorio','class'=>'form-control','placeholder'=>'Resultados de Laboratorio previos']) !!}
							</div>
						</div>

						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Gabinetes con los que acude a esta consulta</span>
								{!! Form::text('gabinete',$evaluacion->gabinete,['id'=>'gabinete','class'=>'form-control','placeholder'=>'Estudios de gabinete previos']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoE','AC',['id'=>'estadoE','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>
	
						{!! link_to('#','Siguiente...',['id'=>'guardarE','class'=>'btn btn-primary btn-sm m-t-10']) !!}

						<div class="form-group">
						{!! Form::hidden('id_evaluacion',$evaluacion->id_evaluacion,['id'=>'id_evaluacion','class'=>'form-control','placeholder'=>'idc']) !!}
					</div>
					{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab4">
		    <div class="panel-heading" role="tab" id="headingFour">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		          	Diagnosticos
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      <div class="panel-body">
		      		{!! Form::open(['id'=>'formDiagnostico']) !!}
			        	<div class="form-group">
					    	<label>Tipo Diagnostico</label>
					        <div class="selectContainer">
					            <select class="form-control select-sm input-sm" id="tipo_diagnostico" name="tipo_diagnostico">
					            	@foreach ($tiposd as $tipod)
			                            <option value="{{ $tipod->codigo_dominio }}">{{ $tipod->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>

					    <div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Diagnostico propio</span>
								{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Diagnostico del paciente']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoD','AC',['id'=>'estadoD','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						{!! link_to('#','Siguiente...',['id'=>'guardarD','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						<div class="container" id="ListaDiagnosticos">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
				    {!! Form::close() !!}
		      </div>
		    </div>
		</div>

		<div class="panel panel-default" id="Tab5">
			<div class="panel-heading" role="tab" id="headingFive">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
			      Ordenes de Laboratorio
			    </a>
			  </h4>
			</div>
			<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formOrdenL']) !!}
						<div class="form-group">
					    	<label>Tipo Laboratorio</label>
					        <div class="selectContainer">
					            <select class="form-control select-sm input-sm" id="tipo_laboratorio" name="tipo_laboratorio">
					            	@foreach ($tiposl as $tipol)
			                            <option value="{{ $tipol->codigo_dominio }}">{{ $tipol->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>

					    <div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Indicaciones para el examen </span>
								{!! Form::text('orden',null,['id'=>'orden','class'=>'form-control','placeholder'=>'Indicaciones para el examen']) !!}
							</div>
						</div>

						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Fecha programada para el examen</span>
								{!! Form::text('fechaL',$fecha,['id'=>'fechaL','class'=>'form-control','placeholder'=>'Fecha programada para el examen']) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::hidden('estadoOL','AC',['id'=>'estadoOL','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label for="">
									<input type="checkbox" name="urgenteL" id="urgenteL"> Urgente!
								</label>
							</div>
						</div>


						{!! link_to('#','guardar...',['id'=>'guardarL','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						<div class="container" id="ListaOrdenL">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
					{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab6">
			<div class="panel-heading" role="tab" id="headingSix">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
			      Ordenes de Gabinete
			    </a>
			  </h4>
			</div>
			<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formOrdenG']) !!}
						<div class="form-group">
					    	<label>Tipo Gabinete</label>
					        <div class="selectContainer">
					            <select class="form-control select-sm input-sm" id="tipo_gabinete" name="tipo_gabinete">
					            	@foreach ($tiposg as $tipog)
			                            <option value="{{ $tipog->codigo_dominio }}">{{ $tipog->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>

						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Descripcion complementaria del examen (cabeza, cuello, torax, etc... con/sin contraste...)</span>
								{!! Form::text('complemento',null,['id'=>'complemento','class'=>'form-control','placeholder'=>'Descripcion complementaria del examen (cabeza, cuello, torax, etc... con/sin contraste...)']) !!}
							</div>
						</div>

						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Indicaciones para el examen </span>
								{!! Form::text('ordenG',null,['id'=>'ordenG','class'=>'form-control','placeholder'=>'Indicaciones para el examen']) !!}
							</div>
						</div>

						<div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Fecha programada para el examen</span>
								{!! Form::text('fechaG',$fecha,['id'=>'fechaG','class'=>'form-control','placeholder'=>'Fecha programada para el examen']) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::hidden('estadoOG','AC',['id'=>'estadoOG','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label for="">
									<input type="checkbox" name="urgenteG" id="urgenteG"> Urgente!
								</label>
							</div>
						</div>


						{!! link_to('#','guardar...',['id'=>'guardarG','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						<div class="container" id="ListaOrdenG">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
					{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab7">
			<div class="panel-heading" role="tab" id="headingSeven">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
			      Tratamientos indicados
			    </a>
			  </h4>
			</div>
			<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formTratamiento']) !!}
						<div class="form-group">
					    	<label>Tipo Tratamiento</label>
					        <div class="selectContainer">
					            <select class="form-control select-sm input-sm" id="tipo_tratamiento" name="tipo_tratamiento">
					            	@foreach ($tipost as $tipot)
			                            <option value="{{ $tipot->codigo_dominio }}">{{ $tipot->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>

					    <div class="form-group">
					    	<label>Medicamento</label>
					        <div class="selectContainer">
					            <select class="form-control select-sm input-sm" id="codigo_medicamento" name="codigo_medicamento">
					            	@foreach ($medicamentos as $medicamento)
			                            <option value="{{ $medicamento->codigo_medicamento }}">{{ $medicamento->nombre_medico}} {{ $medicamento->nombre_comercial }} {{ $medicamento->posologia }} {{ $medicamento->presentacion }}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>

					    <div class="form-group">
					    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
					            <span class="input-group-addon" style="max-width: 120px;">Indicaciones del tratamiento</span>
								{!! Form::text('prescripcion',null,['id'=>'prescripcion','class'=>'form-control','placeholder'=>'Indicaciones del tratamiento']) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::hidden('fechaT',$fecha,['id'=>'fechaT','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoT','AC',['id'=>'estadoT','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						{!! link_to('#','guardar...',['id'=>'guardarT','class'=>'btn btn-primary btn-sm m-t-10']) !!}

						<div class="container" id="ListaTratamientos">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
					{!! Form::close() !!}
			  </div>
			</div>
		</div>	
	
	</div>
</div>

@endsection

@section('javascript')
<script>
$(document).ready(function(){
	$('#EFS').hide();
	$('#ocultarP').hide();
	listarDiagnosticos();
	listarOrdenesL();
	listarOrdenesG();
	ListaTratamientos();
});

$('#mostrarP').click(function(){
	$('#EFS').show();
	$('#ocultarP').show();
	$('#mostrarP').hide();
});

$('#ocultarP').click(function(){
	$('#EFS').hide();
	$('#ocultarP').hide();
	$('#mostrarP').show();
});

	$('#guardar').on('click',function(e){
		var id_consulta = $('#id_consulta').val();
		var fecha_inicio = $('#fecha_inicio').val();
		var hora_inicio = $('#hora_inicio').val();
		var id_consultorio = $('#id_consultorio').val();
		var id_medico = $('#id_medico').val();		
		var tipo_consulta = $('#tipo_consulta').val();
		var motivo_consulta = $('#motivo_consulta').val();
		var historia = $('#historia').val();
		var estado = $('#estado').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ url('consulta') }}/"+id_consulta+"";

		var dataString = {fecha_inicio:fecha_inicio, hora_inicio:hora_inicio, id_consultorio:id_consultorio, id_medico:id_medico, tipo_consulta:tipo_consulta, motivo_consulta:motivo_consulta, historia:historia, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'PUT',
		  	datatype:'JSON',
		  	data: dataString,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Consulta se Guardo Correctamente. Siguiente : Examen Fisico');
		  			/*$('#guardar').addClass('disabledTab');
		  			$('#Tab2').removeClass('disabledTab');*/

		  			/*alert(data.id);
		  			
		  			document.getElementById("id_consulta").setAttribute("value",JSON.stringify(data.id));*/
		  			//alert(data.id);
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	//----------------------------------------------- Revision

	$('#guardarR').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var revision_general = $('#revision_general').val();
		var cabeza_cuello = $('#cabeza_cuello').val();
		var torax = $('#torax').val();
		var miembros_superiores = $('#miembros_superiores').val();
		var abdomen = $('#abdomen').val();
		var miembros_inferiores = $('#miembros_inferiores').val();
		var genital_urinario = $('#genital_urinario').val();
		var neurologico = $('#neurologico').val();
		var otros = $('#otros').val();
		var estado = $('#estadoR').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ url('revisionconsulta') }}/"+id_consulta+"";

		var dataStringA = {id_consulta:id_consulta,revision_general:revision_general, cabeza_cuello:cabeza_cuello, torax:torax, miembros_superiores:miembros_superiores, abdomen:abdomen, miembros_inferiores:miembros_inferiores, genital_urinario:genital_urinario, neurologico:neurologico, otros:otros, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'PUT',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Revision se Guardo Correctamente. Siguiente : Evaluacion');
		  			/*$('#guardarR').addClass('disabledTab');
		  			$('#Tab3').removeClass('disabledTab');*/
		  			//listarAlergias();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	//----------------------------------------------- Evaluacion

	$('#guardarE').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var laboratorio = $('#laboratorio').val();
		var gabinete = $('#gabinete').val();
		
		var estado = $('#estadoE').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ url('evaluacion') }}/"+id_consulta+"";

		var dataStringA = {id_consulta:id_consulta,laboratorio:laboratorio, gabinete:gabinete, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'PUT',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Evaluacion se Guardo Correctamente. Siguiente : Diagnosticos');
		  			/*$('#guardarE').addClass('disabledTab');
		  			$('#Tab4').removeClass('disabledTab');
		  			
		  			document.getElementById("id_evaluacion").setAttribute("value",JSON.stringify(data.id));*/
		  			//listarAlergias();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	//----------------------------------------------- Diagnosticos

	$('#guardarD').on('click',function(e){

		var id_evaluacion = $('#id_evaluacion').val();
		var tipo_diagnostico = $('#tipo_diagnostico').val();
		var descripcion = $('#descripcion').val();
		
		var estado = $('#estadoD').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('diagnosticosC.store') }}";

		var dataStringA = {id_evaluacion:id_evaluacion,tipo_diagnostico:tipo_diagnostico, descripcion:descripcion, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Diagnostico se Guardo Correctamente. Siguiente : Ordenes Lab, Gab, Ttos Activas');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab5').removeClass('disabledTab');
		  			$('#Tab6').removeClass('disabledTab');
		  			$('#Tab7').removeClass('disabledTab');*/
		  			listarDiagnosticos();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarDiagnosticos = function(){
		var id_evaluacion=$('#id_evaluacion').val();
		$.ajax({
			type:'GET',
			url:'{{ url('diagnosticosC') }}',
			data: { id_evaluacion:id_evaluacion },
			success:function(data)
			{
				$('#ListaDiagnosticos').empty().html(data);
			}
		});
	}

	var eliminarD = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('diagnosticosC') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarDiagnosticos();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- Laboratorios

	$('#guardarL').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_laboratorio = $('#tipo_laboratorio').val();
		var orden = $('#orden').val();
		var fecha = $('#fechaL').val();

		var urgente="";
		if( $('#urgenteL').prop('checked') ) { urgente = "SI"; }
		else { urgente = "NO"; }

		var estado = $('#estadoOL').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('ordenesL.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_laboratorio:tipo_laboratorio, orden:orden, fecha:fecha, urgente:urgente, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Orden de Lab se Guardo Correctamente');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab6').removeClass('disabledTab');*/
		  			listarOrdenesL();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarOrdenesL = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('ordenesL') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaOrdenL').empty().html(data);
			}
		});
	}

	var eliminarOL = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('ordenesL') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarOrdenesL();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- Gabinetes

	$('#guardarG').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_gabinete = $('#tipo_gabinete').val();
		var complemento = $('#complemento').val();
		var orden = $('#ordenG').val();
		var fecha = $('#fechaG').val();

		var urgente="";
		if( $('#urgenteG').prop('checked') ) { urgente = "SI"; }
		else { urgente = "NO"; }

		var estado = $('#estadoOG').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('ordenesG.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_gabinete:tipo_gabinete, complemento:complemento, orden:orden, fecha:fecha, urgente:urgente, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Orden de Gab se Guardo Correctamente');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab7').removeClass('disabledTab');*/
		  			listarOrdenesG();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarOrdenesG = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('ordenesG') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaOrdenG').empty().html(data);
			}
		});
	}

	var eliminarOG = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('ordenesG') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarOrdenesG();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- Tratamientos

	$('#guardarT').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_tratamiento = $('#tipo_tratamiento').val();
		var codigo_medicamento = $('#codigo_medicamento').val();
		var prescripcion = $('#prescripcion').val();
		var fecha = $('#fechaT').val();

		var estado = $('#estadoT').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('tratamientosC.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_tratamiento:tipo_tratamiento,prescripcion:prescripcion, codigo_medicamento:codigo_medicamento, fecha:fecha, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Tratamiento se Guardo Correctamente');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab7').removeClass('disabledTab');*/
		  			listarTratamientos();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarTratamientos = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('tratamientosC') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaTratamientos').empty().html(data);
			}
		});
	}

	var eliminarT = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('tratamientosC') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarTratamientos();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}
</script>

@stop