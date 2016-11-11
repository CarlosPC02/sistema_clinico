<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>IDH</th>
                    <th>Tratamiento</th>
                    <th>Causal</th>
                    <th>Modo</th>                
                </thead>
                <tbody>
                    @foreach($tratamientos as $tratamiento)
                    <tr>
                        <td>{{ $tratamiento->id_historia }}</td>
                        <td>{{ $tratamiento->tratamiento }}</td>
                        <td>{{ $tratamiento->causa_tratamiento }}</td>
                        <td>{{ $tratamiento->modo_tratamiento }}</td>
                        <td><a href="#" onclick="eliminar('{{ $tratamiento->id_tratamiento_historia}}','tratamientosH','ListaTratamientos')"> [Eliminar]</a></td>
                        {{-- <td><a href="#" onclick="eliminarT('{{ $tratamiento->id_tratamiento_historia}}')"> [Eliminar]</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>