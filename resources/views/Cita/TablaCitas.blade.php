<div class="table-responsive">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th>Medico</th>
                    <th>Opciones</th>
                </thead>
            <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita-> fecha}}</td>
                        <td>{{ $cita-> hora}}</td>
                        <td>{{ $cita-> nombre}} {{ $cita-> ap_paterno}}</td>
                        <td>{{ $cita-> motivo}}</td>
                        <td> {{ $cita->nombrem }} {{ $cita->apellidom }}</td>
                        <td>
                            <a href="{{ route('cita.edit',$cita->id_cita) }}" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
                            <a href="{{ url('/CancelarCita',[$cita->id_cita]) }}" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
                            <a href="{{ url('/SeleccionarPersona', [$cita->id_persona,'100']) }}"> <span class="fui-user"></span> Seleccionar </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
</div>

<!-- Aqui se debe desarrollar los modales para editar y para cancelar la cita.... -->

