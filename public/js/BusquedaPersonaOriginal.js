var timer;

function up()
{	//alert('El token es: '+$('#token').val());
	$.ajaxSetup({
				headers:{
							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
						}
			});
	timer=setTimeout(function()
	{
		var keywords=$('#nombre').val();
		var token=$('#token').val();
		if(keywords.length>0)
		{
			$.post('http://localhost:8000/buscarpersonas',{keywords:keywords,token:token},function(markup)
			{
				$('#resultadobusqueda').html(markup);
			} );
		}
			
	},300);
		
}
function down()
{
	clearTimeout(timer);
}
function buscarpersonas(tipo_busqueda){
	$.ajaxSetup({
				headers:{
							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
						}
			});
	var nombre=$('#nombre').val();
	var ap_paterno=$('#ap_paterno').val();
	var ap_materno=$('#ap_materno').val();
	var codigo_transaccion=$('#codigo_transaccion').val();
	var token=$('#token').val();
	var tipo_busqueda='/'+tipo_busqueda;
	//alert (tipo_busqueda);
	//alert(nombre+" "+ap_paterno+" "+ap_materno);
	if((nombre.length>3 && ap_paterno.length>3)||(nombre.length>3 && ap_materno.length>3)||(ap_paterno.length>3 && ap_materno.length>3))
	{
		//$.post('/buscarpersonas',{nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,token:token},function(markup)
		$.post(tipo_busqueda,{nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,codigo_transaccion:codigo_transaccion,token:token},function(markup)
		{
			$('#resultadobusqueda').html(markup);
		} );
	}
	else
		{alert ("Por favor debe ingresar por lo menos dos datos y 4 caracteres para la busqueda");}
}
