<div class="container-fluid">
    <div class="table-responsive">
        <div class="container-fluid">
            <table class="table table-bordered table-condensed tabla_small">
                <thead>
                    <th>IDH</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>                
                </thead>
                <tbody>
                    @foreach($antecedentes as $antecedente)
                    <tr>
                        <td>{{ $antecedente->id_historia }}</td>
                        <td>{{ $antecedente->tipo_antecedente }}</td>
                        <td>{{ $antecedente->descripcion }}</td>
                        <!-- <td><a href="#" onclick="eliminarN('{ $antecedente->id_antecedente_historia}}','antecedentesH','ListaAntecedentes')"> [Eliminar]</a></td> -->
                        <td><a href="#" onclick="eliminarN('{{ $antecedente->id_antecedente_historia}}')"> [Eliminar]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>