//Historia
$('#guardar').on('click',function(){

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
	});

//Alergias

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
		  			listar('alergia','ListaAlergias');
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

//Diagnosticos
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
		  			listar('diagnosticosH','ListaDiagnosticos');
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

//tratamientos
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
		  			listar('tratamientosH','ListaTratamientos');
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

//antecedentes
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
		  			listar('antecedentesH','ListaAntecedentes');
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

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
		  			listar('nopatologicosH','ListaHabitos');
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});




var listar = function(url,tabla){
		var id_historia=$('#id_historia').val();
		$.ajax({
			type:'GET',
			url:"{{ url('"+url+"') }}",
			data: { id_historia:id_historia },
			success:function(data)
			{
				$('#'+tabla).empty().html(data);
			}
		});
	}


var eliminar = function (id,url,tabla)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('"+url+"') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listar(url,tabla);
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}