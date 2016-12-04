<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>ID</th>
                    <th>Tipo Gabinete</th>
                    <th>Complemento</th>
                    <th>Orden</th>
                    <th>Fecha Programada</th>
                    <th>Urgente</th>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->id_consulta }}</td>
                        <td>{{ $orden->tipo_gabinete }}</td>
                        <td>{{ $orden->complemento }}</td>
                        <td>{{ $orden->orden }}</td>
                        <td>{{ $orden->fecha }}</td>
                        <td>{{ $orden->urgente }}</td>
                        <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                        <td><a href="#" onclick="eliminarOG('{{ $orden->id_orden_gabinete}}')"> [Eliminar]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>