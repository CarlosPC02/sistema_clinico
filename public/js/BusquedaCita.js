$('#botonBuscarCitas').on('click',function(){

	$.ajaxSetup({
  				headers:{
  							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  						}
	});

	var fechaE = $('#dtp_input2').val();
	var horaE=$('#dtp_input3').val();
	var medico=$('#id_medico').val();
	var token=$('#token').val();

	var tipo_busqueda='/BuscarCita'; //crea la ruta a la cual manda los datos para la busqueda
	
	$.post(tipo_busqueda,{fechaE:fechaE,horaE:horaE,medico:medico,token:token},function(markup)
	{
	  		$('#resultadoBusquedaCita').html(markup); //sustituye el contenido de #resultadobusqueda
	} );
});