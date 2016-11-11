<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>IDH</th>
                    <th>Tipo</th>
                    <th>Severidad</th>
                    <th>Agente</th>                
                </thead>
                <tbody>
                    @foreach($alergias as $alergia)
                    <tr>
                        <td>{{ $alergia->id_historia }}</td>
                        <td>{{ $alergia->tipo_alergia }}</td>
                        <td>{{ $alergia->severidad }}</td>
                        <td>{{ $alergia->agente }}</td>
                        <td><a href="#" onclick="eliminar('{{ $alergia->id_alergia}}','alergia','ListaAlergias')"> [Eliminar]</a></td>
                        {{-- <td><a href="#" onclick="eliminarA('{{ $alergia->id_alergia}}')"> [Eliminar]</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
