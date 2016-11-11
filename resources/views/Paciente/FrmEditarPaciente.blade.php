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
		</div>

		<div class="panel-body">				

				{!! Form::model($paciente,['route'=>['paciente.update',$paciente->id_persona],'method'=>'put']) !!}

					<div class="container">


						<div class="form-group">
							<label class="control-label">Tipo Seguro</label>
							<div class="selectContainer">
							   <select class="form-control" id="tipo_seguro" name="tipo_seguro">
							   @foreach ($tipos_seguros as $tipo_seguro)
							      <option value="{{ $tipo_seguro->codigo_dominio}}">{{ $tipo_seguro->descripcion}}</option>
							   @endforeach  
							   </select>
							</div>
							</div>
						
						<div class="form-group">
							<p>Codigo de seguro previo: {{ $paciente->codigo_seguro }}</p>
						</div>

						<div class="form-group" id='detalle_seguros' name='detalle_seguros'>
							<input type="hidden" name="_token1" value="{{ csrf_token() }}" id="token1">
							<label class="control-label">Seguro vigente</label>
							<div class="selectContainer" id="seguros" name="seguros">
							   <select class="form-control" id="codigo_seguro" name="codigo_seguro">
							       <option value="">Elija una opcion</option>
							   </select>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Numero de Autorizacion:') !!}
							{!! Form::text('matricula_seguro',null,['id'=>'matricula_seguro','class'=>'form-control','placeholder'=>'Numero de Autorizacion','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('Religion:') !!}
							{!! Form::text('religion',null,['id'=>'religion','class'=>'form-control','placeholder'=>'Religion','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>

						<div class="form-horizontal">
							<div class="form-group">
								<label for="registro" class="control-label">Numero de Registro (a prueba)</label>
								<div class="bordes_izq_der">
									<input id="registro" type="text" class="form-control" placeholder="Numero de Registro" autocomplete="off">
								</div>
								<div class="bordes_izq_der">
									<button id="btnGenerar" type="button" class="btn btn-success">Generar</button>
								</div>
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Observaciones:') !!}
							{!! Form::text('observaciones',null,['id'=>'observaciones','class'=>'form-control','placeholder'=>'Observaciones','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
						</div>
					</div>

					{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning']) !!}

				{!! Form::close() !!}

		</div>
	</div>
</div>

@endsection





