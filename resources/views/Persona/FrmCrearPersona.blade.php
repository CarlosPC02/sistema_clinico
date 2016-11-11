@extends('layouts.paracelso')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Registro de Paciente</h6>
</div>
<!-- Fin de Titulo -->

<meta name="csrf-token" content="{{csrf_token()}}"/>

<div class="container-fluid marco_trabajo">

	@if ($errors->any())
		<div class="panel-heading">
			<div class="alert alert-danger alerta_small">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><span class="fui-cross-circle"></span> Por favor corrija los siguentes errores:</strong>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>    
		</div>
	@endif
		
	<div role="tabpanel">
		<div class="navbar-header navbar-default">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		</div>

		<div class="collapse navbar-collapse marco_tabs" id="menu" role="navigation">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active" role="presentation"><a href="#tab1" aria-controls="" data-toggle="tab" role="tab">Informacion Basica</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="" data-toggle="tab" role="tab">Informacion de Contacto</a></li>
				<li role="presentation"><a href="#tab3" aria-controls="" data-toggle="tab" role="tab">Informacion Adicional</a></li>
			</ul>
		</div>

		{!! Form::open(['route'=>'persona.store','method'=>'POST','role'=>'form']) !!}
		
		<div class="tab-content">
			<div class="tab-pane active" role="tabpanel" id="tab1">
				<div class="container-fluid marco_trabajo_paciente">

				<div class="form-group" style="padding-top: 5px; margin-left: -15px;">
					<div class="input-group input-group-sm">
		            <span class="input-group-addon">Nombre</span>
						{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            <span class="input-group-addon">Ap Paterno</span>
						{!! Form::text('ap_paterno',null,['id'=>'ap_paterno','class'=>'form-control','placeholder'=>'Apellido Paterno','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            <span class="input-group-addon">Ap Materno</span>
						{!! Form::text('ap_materno',null,['id'=>'ap_materno','class'=>'form-control','placeholder'=>'Apellido Materno','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				{{-- <div class="form-group">
					{!! Form::label('Fecha de Nacimiento:') !!}
					{!! Form::date('fecha_nacimiento',null,['id'=>'fecha_nacimiento','class'=>'form-control','placeholder'=>'dd/mm/aaaa','autocomplete'=>'off']) !!}
				</div> --}}

				<div class="form-group" style="width: auto; min-width: 150px;">
	                <!-- <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento</label> -->
	                <div class="input-group input-group-sm posicion_input date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="fecha_nacimiento" data-link-format="yyyy-mm-dd">
	                    	<span class="input-group-addon" style="width:100px; min-width: 50px;">F. Nac</span>
	                    	<input class="form-control" size="15" type="text" value="" readonly />
	                    	<span class="input-group-addon" style="max-width: 30px;"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon" style="max-width: 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
					<input type="hidden" id="fecha_nacimiento" name="fecha_nacimiento" value="" /><br/>
            	</div>

				<div class="form-group" style="margin-top: -40px;">
					<label class="control-label">Tipo Documento</label>
					<div class="selectContainer posicion_input">
					   <select name="tipo_documento" id="tipo_documento" class="form-control input-sm">
								@foreach ($dominios as $dominio)
										<option value="{{ $dominio->codigo_dominio }}">{{ $dominio->descripcion}}</option>
								@endforeach  
							</select>
					</div>
		   		</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            <span class="input-group-addon">No. Doc</span>
						{!! Form::text('documento_identidad',null,['id'=>'documento_identidad','class'=>'form-control','placeholder'=>'Documento de Identidad','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label">Genero</label>
					<label class="radio" style="margin-top: -10px;">
			            <input type="radio" name="genero" id="M" data-toggle="radio">
			            Masculino
			        </label>
			        <label class="radio">
			            <input type="radio" name="genero" id="F" data-toggle="radio">
			            Femenino
			        </label>
          <!-- 
					{!! Form::label('Genero:') !!}
					{!! Form::radio('genero','M',['id'=>'genero']) !!} <br>
					{!! Form::radio('genero','F',['id'=>'genero']) !!} -->
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary','style'=>'width: 120px; margin-top: -10px; margin-left: -15px; margin-bottom: 10px;']) !!}

				</div>
			</div>
			
			<!-- Tab 2 -->
			<div class="tab-pane" role="tabpanel" id="tab2">
				<div class="container-fluid marco_trabajo_paciente">
				<div class="form-group">
					<div class="input-group input-group-sm" style="padding-top: 5px; margin-left: -15px;">
		            <span class="input-group-addon">Celular</span>
						{!! Form::number('no_celular',null,['id'=>'no_celular','class'=>'form-control','placeholder'=>'Telefono Celular','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            	<span class="input-group-addon">Tel. Casa</span>
						{!! Form::number('no_telefono',null,['id'=>'no_telefono','class'=>'form-control','placeholder'=>'Telefono de Domicilio','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            	<span class="input-group-addon">Tel. Trabajo</span>
						{!! Form::number('no_telefono_trabajo',null,['id'=>'no_telefono_trabajo','class'=>'form-control','placeholder'=>'Telefono del Trabajo','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            	<span class="input-group-addon">e-Mail</span>
						{!! Form::email('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Correo Electronico','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            	<span class="input-group-addon">Direccion</span>
						{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion Actual','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm posicion_input">
		            	<span class="input-group-addon">Ciudad</span>
						{!! Form::text('ciudad_residencia',null,['id'=>'ciudad_residencia','class'=>'form-control','placeholder'=>'Ciudad de Residencia','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>
				</div>
			</div>
			
			<!-- Tab 3 -->
			<div class="tab-pane" role="tabpanel" id="tab3">
				<div class="container-fluid marco_trabajo_paciente">
					
					<div class="form-group">
						<label class="control-label">Tipo Seguro</label>
						<div class="selectContainer posicion_input">
						   <select class="form-control input-sm" id="tipo_seguro" name="tipo_seguro">
						   @foreach ($tipos_seguros as $tipo_seguro)
						      <option value="{{ $tipo_seguro->codigo_dominio}}">{{ $tipo_seguro->descripcion}}</option>
						   @endforeach  
						   </select>
						</div>
			   		</div>

					<div class="form-group" id='detalle_seguros' name='detalle_seguros'>
						<input type="hidden" name="_token1" value="{{ csrf_token() }}" id="token1">
						<label class="control-label">Seguro vigente</label>
						<div class="selectContainer posicion_input" id="seguros" name="seguros">
						   <select class="form-control input-sm" id="codigo_seguro" name="codigo_seguro">
						       <option value="">Elija una opcion</option>
						   </select>
						</div>
			    	</div>

			    	<div class="form-group">
			    		<div class="input-group input-group-sm posicion_input">
		            		<span class="input-group-addon">#Autorizacion</span>
							{!! Form::text('matricula_seguro',null,['id'=>'matricula_seguro','class'=>'form-control','placeholder'=>'Numero de Autorizacion','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="input-group input-group-sm posicion_input">
		            		<span class="input-group-addon">Religion</span>
							{!! Form::text('religion',null,['id'=>'religion','class'=>'form-control','placeholder'=>'Religion','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>
					</div>

					<div class="form-group">
		                <div class="input-group input-group-sm posicion_input">
		                	<span class="input-group-addon" style="width:100px; min-width: 50px;">#Registro</span>
		                	{!! Form::text('registro',null,['id'=>'registro','class'=>'form-control','placeholder'=>'Numero de Registro','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
							<span class="input-group-addon" style="max-width: 40px;"><span class="glyphicon glyphicon-repeat"></span></span>
		                </div>
		            </div>

					<div class="form-group">
						<div class="input-group input-group-sm posicion_input">
		            		<span class="input-group-addon">Observaciones</span>
							{!! Form::text('observaciones',null,['id'=>'observaciones','class'=>'form-control','placeholder'=>'Observaciones','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>



@endsection