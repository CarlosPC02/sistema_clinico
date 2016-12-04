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
                    @foreach($nopatologicos as $nopatologico)
                    <tr>
                        <td>{{ $nopatologico->id_historia }}</td>
                        <td>{{ $nopatologico->tipo_habito }}</td>
                        <td>{{ $nopatologico->descripcionh }}</td>
                        <!-- <td><a href="#" onclick="eliminar('{ $nopatologico->id_no_patologico}}','nopatologicosH','ListaHabitos')"> [Eliminar]</a></td> -->
                        <td><a href="#" onclick="eliminarNP('{{ $nopatologico->id_no_patologico}}')"> [Eliminar]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>