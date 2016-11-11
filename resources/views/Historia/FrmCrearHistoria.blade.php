@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Historia Clinica</h6>
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
			      Informacion General
			    </a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
				  	{{-- {!! Form::open(['route'=>'historia.store','method'=>'POST','role'=>'form']) !!} --}}
				    {!! Form::open(['id'=>'formHistoria']) !!}

				    <div class="form-group">
				    	<label>Medico Responsable</label>
				        <div class="selectContainer">
				            <select class="form-control select-sm input-sm" id="id_medico" name="id_medico">
				            	@foreach ($medicos as $medico)
		                                    <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->ap_paterno." ".$medico->ap_materno}}</option>
		                         @endforeach  
				            </select>
				        </div>
				    </div>
				    
				    <div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Fecha</span>
							{!! Form::text('fecha',$fecha,['id'=>'fecha','class'=>'form-control','placeholder'=>'Fecha']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Hora</span>
							{!! Form::text('hora',$hora,['id'=>'hora','class'=>'form-control','placeholder'=>'hora']) !!}
						</div>
					</div>
					
					<div class="form-group">
				    	<label>Grupo Sanguineo</label>
				        <div class="selectContainer">
				            <select class="form-control" id="grupo_sanguineo" name="grupo_sanguineo">
		                        <option value="O Rh(+)">O Rh(+)</option>
		                        <option value="A Rh(+)">A Rh(+)</option>
		                        <option value="B Rh(+)">B Rh(+)</option>
		                        <option value="AB Rh(+)">AB Rh(+)</option>
		                        <option value="O Rh(-)">O Rh(-)</option>
		                        <option value="A Rh(-)">A Rh(-)</option>
		                        <option value="B Rh(-)">B Rh(-)</option>
		                        <option value="AB Rh(-)">AB Rh(-)</option>
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				    	<div class="input-group input-group-sm" style="margin-bottom: -10px; margin-top: -10px;">
				            <span class="input-group-addon" style="max-width: 80px;">Notas</span>
							{!! Form::text('nota',null,['id'=>'nota','class'=>'form-control','placeholder'=>'Notas']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!} --}}
					
					{!! link_to('#','guardar',['id'=>'guardar','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					<div class="form-group">
						{!! Form::hidden('id_historia','',['id'=>'id_historia','class'=>'form-control','placeholder'=>'idh']) !!}
					</div>
					{{-- <button id="mostrar" type="button">Mostrar</button> --}}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	<!-- ESTAS SON LAS TABS DEPENDIENTES DE LA CREACION DE HISTORIA -->

		<div class="panel panel-default disabledTab" id="Tab2">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			      Alergias
			    </a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
				
				{{-- {!! Form::open(['route'=>'alergia.store','method'=>'POST','role'=>'form']) !!} --}}
			    {!! Form::open(['id'=>'formAlergia']) !!}
					
			    	<div class="form-group">
				    	<label>Tipo de Alergia</label>
				        <div class="selectContainer">
				            <select class="form-control" id="tipo_alergia" name="tipo_alergia">
				            	@foreach ($tipos as $tipo)
		                            <option value="{{ $tipo->codigo_dominio }}">{{ $tipo->descripcion}}</option>
		                         @endforeach  
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				    	<label>Grado de Severidad</label>
				        <div class="selectContainer bordes_izq_der">
				            <select class="form-control" id="severidad" name="severidad">
		                        <option value="Muy Severo">Muy Severo</option>
		                        <option value="Severo">Severo</option>
		                        <option value="Moderado">Moderado</option>
		                        <option value="Leve">Leve</option>
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
						{!! Form::label('Agente causal') !!}
						{!! Form::text('agente',null,['id'=>'agente','class'=>'form-control','placeholder'=>'Agente causal']) !!}						
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoA','AC',['id'=>'estadoA','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','guardar',['id'=>'guardarAlergia','class'=>'btn btn-warning btn-sm m-t-10']) !!}

					<div class="container" id="ListaAlergias">
		            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
		        	</div>

				{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default disabledTab" id="Tab3">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			      Diagnosticos previos
			    </a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
				{!! Form::open(['id'=>'formDiagnostico']) !!}

					<div class="form-group">
						{!! Form::label('Diagnostico propio') !!}
						{!! Form::text('diagnostico',null,['id'=>'diagnostico','class'=>'form-control','placeholder'=>'Diagnostico propio']) !!}						
					</div>
					
			    	<div class="form-group">
						{!! Form::label('Diagnostico CIE 10') !!}
						{!! Form::text('diagnostico_cie10',null,['id'=>'diagnostico_cie10','class'=>'form-control','placeholder'=>'codigo - Diagnostico CIE 10']) !!}						
					</div>

				    <div class="form-group">
				    	<label>Tipo diagnostico</label>
				        <div class="selectContainer bordes_izq_der">
				            <select class="form-control" id="agudo_cronico" name="agudo_cronico">
		                        <option value="A">Agudo</option>
		                        <option value="C">Cronico</option>
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
						{!! Form::label('Comentarios') !!}
						{!! Form::text('comentarios',null,['id'=>'comentarios','class'=>'form-control','placeholder'=>'Comentarios']) !!}						
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoD','AC',['id'=>'estadoD','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','guardar',['id'=>'guardarDiagnostico','class'=>'btn btn-warning btn-sm m-t-10']) !!}

					<div class="container" id="ListaDiagnosticos">
		            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
		        	</div>

				{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default disabledTab" id="Tab4">
		    <div class="panel-heading" role="tab" id="headingFour">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		          	Tratamientos previos
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      <div class="panel-body">
		        	{!! Form::open(['id'=>'formTratamiento']) !!}
						<div class="form-group">
							{!! Form::label('Tratamiento/Terapia') !!}
							{!! Form::text('tratamiento',null,['id'=>'tratamiento','class'=>'form-control','placeholder'=>'Tratamiento/Terapia']) !!}						
						</div>

						<div class="form-group">
							{!! Form::label('Diagnostico/Causal') !!}
							{!! Form::text('causa_tratamiento',null,['id'=>'causa_tratamiento','class'=>'form-control','placeholder'=>'Diagnostico/Causal']) !!}					
						</div>

						<div class="form-group">
							{!! Form::label('Como lo recibe') !!}
							{!! Form::text('modo_tratamiento',null,['id'=>'modo_tratamiento','class'=>'form-control','placeholder'=>'Como lo recibe']) !!}					
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoT','AC',['id'=>'estadoT','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','guardar',['id'=>'guardarTratamiento','class'=>'btn btn-warning btn-sm m-t-10']) !!}

						<div class="container" id="ListaTratamientos">
			            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
			        	</div>

		        	{!! Form::close() !!}
		      </div>
		    </div>
		 </div>

		<div class="panel panel-default disabledTab" id="Tab5">
			<div class="panel-heading" role="tab" id="headingFive">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
			      Antecedentes importantes
			    </a>
			  </h4>
			</div>
			<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formAntecedentes']) !!}
						<div class="form-group">
					    	<label>Tipo de Antecedente</label>
					        <div class="selectContainer">
					            <select class="form-control" id="tipo_antecedente" name="tipo_antecedente">
					            	@foreach ($tipoa as $tipoas)
			                            <option value="{{ $tipoas->codigo_dominio }}">{{ $tipoas->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>
						
						<div class="form-group">
							{!! Form::label('Descripcion del antecedente') !!}
							{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripcion del antecedente']) !!}					
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoN','AC',['id'=>'estadoN','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','guardar',['id'=>'guardarAntecedente','class'=>'btn btn-warning btn-sm m-t-10']) !!}

						<div class="container" id="ListaAntecedentes">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>

					{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default disabledTab" id="Tab6">
			<div class="panel-heading" role="tab" id="headingSix">
			  <h4 class="panel-title">
			    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
			      Habitos Personales
			    </a>
			  </h4>
			</div>
			<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formNopatologicos']) !!}
						<div class="form-group">
							{!! Form::label('Tipo de Habito/Ant. NO patologico') !!}
							{!! Form::text('tipo_habito',null,['id'=>'tipo_habito','class'=>'form-control','placeholder'=>'Tipo de Habito/Ant. NO patologico']) !!}					
						</div>
						<div class="form-group">
							{!! Form::label('Descripcion...') !!}
							{!! Form::text('descripcionh',null,['id'=>'descripcionh','class'=>'form-control','placeholder'=>'Descripcion...']) !!}					
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoNP','AC',['id'=>'estadoNP','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','guardar',['id'=>'guardarNopatologico','class'=>'btn btn-warning btn-sm m-t-10']) !!}

						<div class="container" id="ListaHabitos">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
					{!! Form::close() !!}
			  </div>
			</div>
		</div>

	
	<!-- PENDIENTE DE DESARROLLAR -->
	
	</div>
</div>

@endsection

@section('javascript')
<script>
	// CODIGO DE PRUEBAS PARA MOSTRAR ALGUNAS COSAS

	// $('#mostrar').on('click',function(e){
	// 	var foo="{ session('id_trabajo') }";
	// 	alert(foo);
	// 	// var id= $_session['id_trabajo'];
	// 	// alert(id);
	// });

	$('#guardar').on('click',function(e){

		var id_medico = $('#id_medico').val();
		var fecha = $('#fecha').val();
		var hora = $('#hora').val();
		var grupo_sanguineo = $('#grupo_sanguineo').val();
		var nota = $('#nota').val();
		var estado = $('#estado').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('historia.store') }}";

		var dataString = {id_medico:id_medico, fecha:fecha, hora:hora, grupo_sanguineo:grupo_sanguineo, nota:nota, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataString,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Historia se Guardo Correctamente: Tabs activas');
		  			$('#guardar').addClass('disabledTab');
		  			$('#Tab2').removeClass('disabledTab');
		  			$('#Tab3').removeClass('disabledTab');
		  			$('#Tab4').removeClass('disabledTab');
		  			$('#Tab5').removeClass('disabledTab');
		  			$('#Tab6').removeClass('disabledTab');
		  			document.getElementById("id_historia").setAttribute("value",JSON.stringify(data.id));
		  			alert(data.id);
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

//----------------------------------------------- Alergias

	$('#guardarAlergia').on('click',function(e){

		var id_historia = $('#id_historia').val();
		var tipo_alergia = $('#tipo_alergia').val();
		var severidad = $('#severidad').val();
		var agente = $('#agente').val();
		var estado = $('#estadoA').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('alergia.store') }}";

		var dataStringA = {id_historia:id_historia, tipo_alergia:tipo_alergia, severidad:severidad, agente:agente, estado:estado, token:token};
		
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
		  			alert('Alergia se Guardo Correctamente:');
		  			listarAlergias();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarAlergias = function(){
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:'{{ url('alergia') }}',
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#ListaAlergias').empty().html(data);
			}
		});
	}

	//----------------------------------------------- Diagnosticos

	$('#guardarDiagnostico').on('click',function(e){

		var id_historia = $('#id_historia').val();
		var diagnostico = $('#diagnostico').val();
		var diagnostico_cie10 = $('#diagnostico_cie10').val();
		var agudo_cronico = $('#agudo_cronico').val();
		var comentarios = $('#comentarios').val();
		var estado = $('#estadoD').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('diagnosticosH.store') }}";

		var dataStringA = {id_historia:id_historia, diagnostico:diagnostico, diagnostico_cie10:diagnostico_cie10, agudo_cronico:agudo_cronico, comentarios:comentarios, estado:estado, token:token};
		
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
		  			alert('Diagnostico se Guardo Correctamente:');
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
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:'{{ url('diagnosticosH') }}',
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#ListaDiagnosticos').empty().html(data);
			}
		});
	}

	//----------------------------------------- tratamientos

	$('#guardarTratamiento').on('click',function(e){

		var id_historia = $('#id_historia').val();
		var tratamiento = $('#tratamiento').val();
		var causa_tratamiento = $('#causa_tratamiento').val();
		var modo_tratamiento = $('#modo_tratamiento').val();
		var estado = $('#estadoT').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('tratamientosH.store') }}";

		var dataStringA = {id_historia:id_historia, tratamiento:tratamiento, causa_tratamiento:causa_tratamiento, modo_tratamiento:modo_tratamiento, estado:estado, token:token};
		
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
		  			alert('Tratamiento se Guardo Correctamente:');
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
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:'{{ url('tratamientosH') }}',
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#ListaTratamientos').empty().html(data);
			}
		});
	}

	//----------------------------------------- antecedentes

	$('#guardarAntecedente').on('click',function(e){

		var id_historia = $('#id_historia').val();
		var tipo_antecedente = $('#tipo_antecedente').val();
		var descripcion = $('#descripcion').val();
		var estado = $('#estadoN').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('antecedentesH.store') }}";

		var dataStringA = {id_historia:id_historia, tipo_antecedente:tipo_antecedente, descripcion:descripcion, estado:estado, token:token};
		
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
		  			alert('Antecedente se Guardo Correctamente:');
		  			listarAntecedentes();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarAntecedentes = function(){
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:'{{ url('antecedentesH') }}',
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#ListaAntecedentes').empty().html(data);
			}
		});
	}

	//----------------------------------------- no patologicos

	$('#guardarNopatologico').on('click',function(e){

		var id_historia = $('#id_historia').val();
		var tipo_habito = $('#tipo_habito').val();
		var descripcionh = $('#descripcionh').val();
		var estado = $('#estadoNP').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('nopatologicosH.store') }}";

		var dataStringA = {id_historia:id_historia, tipo_habito:tipo_habito, descripcionh:descripcionh, estado:estado, token:token};
		
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
		  			alert('Habito se Guardo Correctamente:');
		  			listarNopatologicos();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarNopatologicos = function(){
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:'{{ url('nopatologicosH') }}',
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#ListaHabitos').empty().html(data);
			}
		});
	}



	// seccion de eliminar registros

	var eliminarA = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('alergia') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarAlergias();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	var eliminarD = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('diagnosticosH') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarAlergias();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	var eliminarT = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('tratamientosH') }}/"+id+"";
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

	var eliminarN = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('antecedentesH') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarAntecedentes();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	var eliminarNP = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('nopatologicosH') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarNopatologicos();
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
