<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>IDE</th>
                    <th>Tipo Diagnostico</th>
                    <th>Descripcion</th>
                    <th>CIE</th>
                </thead>
                <tbody>
                    @foreach($diagnosticos as $diagnostico)
                    <tr>
                        <td>{{ $diagnostico->id_evaluacion }}</td>
                        <td>{{ $diagnostico->tipo_diagnostico }}</td>
                        <td>{{ $diagnostico->descripcion }}</td>
                        <td>{{ $diagnostico->codigo_cie }}</td>
                        <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                        <td><a href="#" onclick="eliminarD('{{ $diagnostico->id_diagnostico}}')"> [Eliminar]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>