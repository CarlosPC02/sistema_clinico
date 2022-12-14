@extends('layouts.paracelso')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Editar Datos de Persona</h6>
</div>
<!-- Fin de Titulo -->

<meta name="csrf-token" content="{{csrf_token()}}"/>

<div class="container-fluid marco_trabajo">
	<div class="panel-default">

		<div class="panel-heading">
			@if ($errors->any())
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Por favor corrige los siguentes errores:</strong>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
	    		</div>    
	 		@endif
		</div>

		<div class="panel-body">
			<div role="tabpanel" style="margin-left: -15px;">

				<div class="navbar-header navbar-default">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>

				<div class="collapse navbar-collapse" id="menu" role="navigation">
					<ul class="nav nav-tabs" role="tablist">
						<li class="active" role="presentation"><a href="#tab1" aria-controls="" data-toggle="tab" role="tab">Informacion Basica</a></li>
						<li role="presentation"><a href="#tab2" aria-controls="" data-toggle="tab" role="tab">Informacion Contacto</a></li>
					</ul>
				</div>

				{!! Form::model($persona,['route'=>['persona.update',$persona->id_persona],'method'=>'put']) !!}

				<div class="tab-content">
					<div class="tab-pane active" role="tabpanel" id="tab1">
						<div class="container">

						<div class="form-group" style="padding-top: 15px;">
							<div class="input-group input-group-sm posicion_input">
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

						<div class="form-group">
							<div class="input-group input-group-sm posicion_input">
								<span class="input-group-addon" style="min-width: 50px; width: 100px;">Fecha Nac</span>
								{!! Form::date('fecha_nacimiento',null,['id'=>'fecha_nacimiento','class'=>'form-control','placeholder'=>'aaaa-mm-dd','autocomplete'=>'off']) !!}
							</div>
						</div>

						<div class="form-group">
						 	<label class="control-label">Tipo Documento</label>
							<div class="selectContainer input-group-sm posicion_input">
							   <select name="tipo_documento" id="tipo_documento" class="form-control">
									@foreach ($dominios as $dominio)
										<option value="{{ $dominio->codigo_dominio }}">{{ $dominio->descripcion}}</option>
									@endforeach  
								</select>
							</div>
				   		</div>

						<div class="form-group">
							<div class="input-group input-group-sm posicion_input">
								<span class="input-group-addon">N?? Documento</span>
								{!! Form::text('documento_identidad',null,['id'=>'documento_identidad','class'=>'form-control','placeholder'=>'Documento de Identidad','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Genero:') !!}<br>
							{!! Form::radio('genero','M',['id'=>'genero']) !!} 
							{!! Form::label('Masculino') !!}<br>
							{!! Form::radio('genero','F',['id'=>'genero']) !!}
							{!! Form::label('Femenino') !!}
						</div>

						{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning']) !!}

						</div>
					</div>
					
					<!-- Tab 2 -->
					<div class="tab-pane" role="tabpanel" id="tab2">
						<div class="container">
						<div class="form-group">
							{!! Form::label('Celular :') !!}
							{!! Form::number('no_celular',null,['id'=>'no_celular','class'=>'form-control','placeholder'=>'Telefono Celular','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Telefono de Domicilio:') !!}
							{!! Form::number('no_telefono',null,['id'=>'no_telefono','class'=>'form-control','placeholder'=>'Telefono de Domicilio','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Telefono del Trabajo:') !!}
							{!! Form::number('no_telefono_trabajo',null,['id'=>'no_telefono_trabajo','class'=>'form-control','placeholder'=>'Telefono del Trabajo','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('e-Mail :') !!}
							{!! Form::email('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'e-Mail','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Direccion Actual :') !!}
							{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion Actual','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Ciudad de Residencia:') !!}
							{!! Form::text('ciudad_residencia',null,['id'=>'ciudad_residencia','class'=>'form-control','placeholder'=>'Ciudad de Residencia','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>
						</div>
					</div>

				</div>

				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>



@endsection