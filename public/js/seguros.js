$('#tipo_seguro').on('change',function(){
	$.ajaxSetup({
				headers:{
							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
						}
			});
	var tipo_seguro=$('#tipo_seguro').val();
	var token=$('#token1').val();
	//alert(token);
	if(tipo_seguro.length>1)
	{
		$.post('/seguro',{tipo_seguro:tipo_seguro,token:token},function(markup)
		{
			$('#detalle_seguros').html(markup);
		} );
	}
	else
		{alert ("No existen Tipos de Seguro Configurados");}
});
