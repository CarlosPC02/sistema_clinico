@extends ('layouts.paracelso')

@section('title','Gabinetes de Paciente')

@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
  <h6 id="titulo_principal">Gabinetes del Paciente</h6>
</div>
<!-- Fin de Titulo -->

<div class="container-fluid marco_trabajo">

	<div>@include('Persona.LstDatosBasicos')</div>

	<!-- Gabinetes -->
	<div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <!--<th>ID</th>-->
                    <th style="width: 20px;"></th>
                    <th style="width: 90px;">Fecha</th>
                    <th>Tipo Gabinete</th>
                    <th>Complemento</th>
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
                        <td>{{ $orden->tipo_gabinete }}</td>
                        <td>{{ $orden->complemento }}</td>
                        <td>{{ $orden->orden }}</td>
                        <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                        <td style="text-align: center; padding-top: 15px;">
                        	<a href="#"><span class="fui-eye" style="color: #1ABC9C;" data-toggle="tooltip" title="Ver Resultado"></span> </a>
                        	<a href="#"> <span class="fui-new" style="color: #1ABC9C;" data-toggle="tooltip" title="Actualizar"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection