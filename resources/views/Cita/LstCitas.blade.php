<div class="panel-heading">
    <center><b>CITAS PARA : {{ $fecha }}</b></center>
</div>
<!-- Formulario de Listado de Persona -->
{{ csrf_field() }}
<div class="table-responsive">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                    <th>Institucion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre</th>
                    <th>Paterno</th>
                    <th>Motivo</th>
                    <th>Medico</th>
                    <th>Opciones</th>
                </thead>
            <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita-> codigo_institucion }}</td>
                        <td>{{ $cita-> fecha}}</td>
                        <td>{{ $cita-> hora}}</td>
                        <td>{{ $cita-> nombre}}</td>
                        <td>{{ $cita-> ap_paterno}}</td>
                        <td>{{ $cita-> motivo}}</td>
                        <td> {{ $cita->nombrem }} {{ $cita->apellidom }}</td>
                        <td><a href="#" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit" style="color: #1ABC9C; text-align: center;"></span></a>
                            <a href="#" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" style="color: #C0392B; text-align: center;"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
</div>