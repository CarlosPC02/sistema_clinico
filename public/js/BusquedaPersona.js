$('#botonBuscarPersonas').on('click',function(){
	$.ajaxSetup({
  				headers:{
  							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  						}
	});

	var nombre = $('#nombre').val();
	var ap_paterno=$('#apellido_paterno').val();
	var ap_materno=$('#apellido_materno').val();
	var token=$('#token').val();
	var codigo=$('#codigo').val();

	var tipo_busqueda='/BuscarPersona'; //crea la ruta a la cual manda los datos para la busqueda
	
	if((nombre.length>3 && ap_paterno.length>3)||(nombre.length>3 && ap_materno.length>3)||(ap_paterno.length>3 && ap_materno.length>3))
	{
		// alert({nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,token:token,codigo:codigo});
		$.post(tipo_busqueda,{nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,token:token,codigo:codigo},function(markup)
	 	{
	 		$('#resultadobusqueda').html(markup); //sustituye el contenido de #resultadobusqueda
	 	} );
	}
	else
	 	{alert ("Por favor debe ingresar por lo menos dos datos y 4 caracteres para la busqueda");}
});