@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Historia Clinica</h6>
</div>
<!-- Fin de Titulo -->

<div class="container-fluid marco_trabajo">

<!-- <div class="container-fluid titulo_general">
  	<h6 id="titulo_principal">Historia Clinica</h6>

  	
  	{{-- <p>{{ $fecha }}</p>
  	<p>{{ $hora }}</p> --}}
</div>
 -->
	<div>@include('Persona.LstDatosBasicos')</div>
	{{-- <div id="idhistoria"></div> RECIBIA EL ID_HISTORIA PARA COMPROBAR --}}

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
			  <h4 class="panel-title">
			    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			      General
			    </a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<input type="hidden" id="id_historia" value="{{ $historia->id_historia }}">

					<div class="container">

						<p>Medico: {{ $historia->medico->persona->nombre }} {{ $historia->medico->persona->ap_paterno }}</p>
						<p>Fecha: {{ $historia->fecha }}</p>
						<p>Hora: {{ $historia->hora }}</p>
						<p>Grupo Sanguineo: {{ $historia->grupo_sanguineo }}</p>
						<p>Notas: {{ $historia->nota }}</p>
					</div>

				</div>
			</div>
		</div>
	<!-- ESTAS SON LAS TABS DEPENDIENTES DE LA CREACION DE HISTORIA -->

		<div class="panel panel-default" id="Tab2">
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
					
			    	<div class="form-group" style="margin-top: -10px;">
				    	<label>Tipo de Alergia</label>
				        <div class="selectContainer input-group-sm" style="margin-top: -10px;">
				            <select class="form-control" id="tipo_alergia" name="tipo_alergia">
				            	@foreach ($tipos as $tipo)
		                            <option value="{{ $tipo->codigo_dominio }}">{{ $tipo->descripcion}}</option>
		                         @endforeach  
				            </select>
				        </div>
				    </div>

				    <div class="form-group" style="margin-top: -20px;">
				    	<label>Grado de Severidad</label>
				        <div class="selectContainer input-group-sm" style="margin-top: -10px;">
				            <select class="form-control" id="severidad" name="severidad">
		                        <option value="Muy Severo">Muy Severo</option>
		                        <option value="Severo">Severo</option>
		                        <option value="Moderado">Moderado</option>
		                        <option value="Leve">Leve</option>
				            </select>
				        </div>
				    </div>

				    <div class="form-group" style="margin-left: 15px;">
				    	<div class="input-group input-group-sm posicion_input">
			            	<span class="input-group-addon">Ag caual</span>
							{!! Form::text('agente',null,['id'=>'agente','class'=>'form-control','placeholder'=>'Agente causal']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoA','AC',['id'=>'estadoA','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','Guardar',['id'=>'guardarAlergia','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					<div class="container" id="ListaAlergias">
		            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
		        	</div>

				{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab3">
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
						<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Diag propio</span>
								{!! Form::text('diagnostico',null,['id'=>'diagnostico','class'=>'form-control','placeholder'=>'Diagnostico propio']) !!}
						</div>
					</div>
					
			    	<div class="form-group">
			    		<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Diag CIE10</span>
							{!! Form::text('diagnostico_cie10',null,['id'=>'diagnostico_cie10','class'=>'form-control','placeholder'=>'codigo - Diagnostico CIE 10']) !!}
						</div>
					</div>

				    <div class="form-group" style="margin-top: -20px;">
				    	<label>Tipo diagnostico</label>
				        <div class="selectContainer input-group-sm" style="margin-top: -10px;">
				            <select class="form-control" id="agudo_cronico" name="agudo_cronico">
		                        <option value="A">Agudo</option>
		                        <option value="C">Cronico</option>
				            </select>
				        </div>
				    </div>

				    <div class="form-group">
				    	<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Comentarios</span>
							{!! Form::text('comentarios',null,['id'=>'comentarios','class'=>'form-control','placeholder'=>'Comentarios']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoD','AC',['id'=>'estadoD','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','Guardar',['id'=>'guardarDiagnostico','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					<div class="container" id="ListaDiagnosticos">
		            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
		        	</div>

				{!! Form::close() !!}
			  </div>
			</div>
		</div>

		<div class="panel panel-default" id="Tab4">
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
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Tratamiento</span>
								{!! Form::text('tratamiento',null,['id'=>'tratamiento','class'=>'form-control','placeholder'=>'Tratamiento/Terapia']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Diagnostico</span>
								{!! Form::text('causa_tratamiento',null,['id'=>'causa_tratamiento','class'=>'form-control','placeholder'=>'Diagnostico/Causal']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Como lo recibe</span>
								{!! Form::text('modo_tratamiento',null,['id'=>'modo_tratamiento','class'=>'form-control','placeholder'=>'Como lo recibe']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoT','AC',['id'=>'estadoT','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','Guardar',['id'=>'guardarTratamiento','class'=>'btn btn-primary btn-sm m-t-10']) !!}

						<div class="container" id="ListaTratamientos">
			            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
			        	</div>

		        	{!! Form::close() !!}
		      </div>
		    </div>
		 </div>

		<div class="panel panel-default" id="Tab5">
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
						
						<div class="form-group" style="margin-top: -10px;">
					    	<label>Tipo de Antecedente</label>
					        <div class="selectContainer input-group-sm" style="margin-top: -10px;">
					            <select class="form-control" id="tipo_antecedente" name="tipo_antecedente">
					            	@foreach ($tipoa as $tipoas)
			                            <option value="{{ $tipoas->codigo_dominio }}">{{ $tipoas->descripcion}}</option>
			                         @endforeach  
					            </select>
					        </div>
					    </div>
						
						<div class="form-group" style="margin-top: -10px;">
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Descripcion</span>
								{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripcion del antecedente']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoN','AC',['id'=>'estadoN','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','Guardar',['id'=>'guardarAntecedente','class'=>'btn btn-primary btn-sm m-t-10']) !!}

						<div class="container" id="ListaAntecedentes">
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
			      Habitos Personales
			    </a>
			  </h4>
			</div>
			<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
			  <div class="panel-body">
					{!! Form::open(['id'=>'formNopatologicos']) !!}
						<div class="form-group">
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Tipo hábito</span>
								{!! Form::text('tipo_habito',null,['id'=>'tipo_habito','class'=>'form-control','placeholder'=>'Tipo de Habito/Ant. NO patologico']) !!}
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-sm">
			            	<span class="input-group-addon">Descripcion</span>
								{!! Form::text('descripcionh',null,['id'=>'descripcionh','class'=>'form-control','placeholder'=>'Descripcion...']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::hidden('estadoNP','AC',['id'=>'estadoNP','class'=>'form-control','placeholder'=>'Estado']) !!}					
						</div>

						{!! link_to('#','Guardar',['id'=>'guardarNopatologico','class'=>'btn btn-primary btn-sm m-t-10']) !!}

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

	$(document).ready(function(){
		listarAlergias();
		listarDiagnosticos();
		listarTratamientos();
		listarAntecedentes();
		listarNopatologicos();
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
		var estado = $('#estadoN').val();
		
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