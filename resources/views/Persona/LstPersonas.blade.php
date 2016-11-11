<div class="panel-heading col-md-6" style="margin-left: -20px; margin-bottom: -10px; text-align: center;">
    <p style="text-align: left; float: left;"><strong>Coincidencias Encontradas</strong></p>
</div>

<!-- Formulario de Listado de Persona -->
{{ csrf_field() }}
<div class="table-responsive" style="margin-left: -20px; margin-right: 20px;">
    <div class="container-fluid">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Fecha de Nacimiento</th>
                <th>Documento</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona-> id_persona }}</td>
                    <td>{{ $persona-> nombre }}</td>
                    <td>{{ $persona-> ap_paterno }}</td>
                    <td>{{ $persona-> ap_materno }}</td>
                    <td>{{ $persona-> fecha_nacimiento }}</td>
                    <td>{{ $persona-> documento_identidad }}</td>
                    <td><a href="{{ url('/SeleccionarPersona', [$persona->id_persona,$codigo]) }}"> [Seleccionar] </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>