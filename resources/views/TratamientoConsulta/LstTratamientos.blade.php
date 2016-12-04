<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>ID</th>
                    <th>Tipo Tratamiento</th>
                    <th>Codigo_medicamento</th>
                    <th>Prescripcion</th>                
                </thead>
                <tbody>
                    @foreach($tratamientos as $tratamiento)
                    <tr>
                        <td>{{ $tratamiento->id_consulta }}</td>
                        <td>{{ $tratamiento->tipo_tratamiento }}</td>
                        <td>{{ $tratamiento->codigo_medicamento }}</td>
                        <td>{{ $tratamiento->prescripcion }}</td>
                        <!-- <td><a href="#" onclick="eliminar('{ $tratamiento->id_tratamiento_historia}}','tratamientosH','ListaTratamientos')"> [Eliminar]</a></td> -->
                        <td><a href="#" onclick="eliminarT('{{ $tratamiento->id_tratamiento}}')"> [Eliminar]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>