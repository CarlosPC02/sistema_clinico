@extends ('layouts.paracelso')

@section('title','Laboratorios de Paciente')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Laboratorios del Paciente</h6>
</div>
<!-- Fin de Titulo -->

<div class="container-fluid marco_trabajo">

	<div>@include('Persona.LstDatosBasicos')</div>

	<!-- Laboratorios -->
	<div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <!--<th>ID</th>-->
                    <th style="width: 20px;"></th>
                    <th style="width: 90px;">Fecha</th>
                    <th>Tipo Laboratorio</th>
                    <th>Orden</th>
                    <th style="width: 90px;">Opciones</th>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                    <tr>
                        <!--<td>{{ $orden->id_consulta }}</td>-->
                        @if ($orden->urgente = ('SI'))
                        	<td><span class="fui-star" style="color: #E74C3C;" data-toggle="tooltip" title="Urgente"></span></td>
                        @else
                        	<td></td>
                        @endif
                        <td>{{ $orden->fecha }}</td>
                        <td>{{ $orden->tipo_laboratorio }}</td>
                        <td>{{ $orden->orden }}</td>
                        <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                        <td style="text-align: center; padding-top: 15px;">
                        	<a href="#ver_resultado" data-toggle="modal"> <span class="fui-eye" style="color: #1ABC9C;" data-toggle="tooltip" title="Ver Resultado"></span> </a>
                        	<a href="#actualizar_laboratorio" data-toggle="modal"> <span class="fui-new" style="color: #1ABC9C;" data-toggle="tooltip" title="Actualizar"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Modales-->
    <!-- Modal para registro labs -->
    <div class="modal fade" id="actualizar_laboratorio" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title">Resultados de Laboratorio</h5>
                </div>

                <div class="modal-body">

                <!--Formulario de Respuestas Laboratorios -->
                {!! Form::open(['route'=>'ordenLRespuesta.store','method'=>'POST']) !!}
                {{ csrf_field() }}
                    
                <div class="form-group">
                    {!! Form::hidden('id_persona',session('id_persona'),['id'=>'id_persona']) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('id_orden_laboratorio',$orden->id_orden_laboratorio,['id'=>'id_orden_laboratorio']) !!}
                </div>

                <div class="form-group">
                    <div class="input-group input-group-sm posicion_input">
                    <span class="input-group-addon">Resultado</span>
                        {!! Form::text('resultado',null,['id'=>'resultado','class'=>'form-control','placeholder'=>'Resultado','autocomplete'=>'off','style'=>'text-transform:uppercase;','onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <input id="estado" type="hidden" name="estado" class="form-control" value="AC">
                    </div>
                </div>

                {!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary','style'=>'width: 120px; margin-top: -10px; margin-left: -15px; margin-bottom: 10px;']) !!}
                
                </div>
            </div>
        </div>
    </div>

    <!--Modal para visualizar gabs -->
    <div class="modal fade" id="ver_resultado" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title">Resultados</h5>
                </div>

                <div class="modal-body">

                <p>Desplegar resultado</p>
                
                </div>
            </div>
        </div>
    </div>

</div>
@endsection