<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>IDH</th>
                    <th>Diagnostico</th>
                    <th>CIE 10</th>
                    <th>Tipo</th>
                    <th>Comentarios</th>                
                </thead>
                <tbody>
                    @foreach($diagnosticos as $diagnostico)
                    <tr>
                        <td>{{ $diagnostico->id_historia }}</td>
                        <td>{{ $diagnostico->diagnostico }}</td>
                        <td>{{ $diagnostico->diagnostico_cie10 }}</td>
                        <td>{{ $diagnostico->agudo_cronico }}</td>
                        <td>{{ $diagnostico->comentarios }}</td>
                        <td><a href="#" onclick="eliminarD('{{ $diagnostico->id_diagnostico_historia}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td>
                        {{-- <td><a href="#" onclick="eliminarD('{{ $diagnostico->id_diagnostico_historia}}')"> [Eliminar]</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>