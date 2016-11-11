<?php

namespace App\Repositories;

use App\Models\Dominio;
use App\Models\Seguro;

class DominioRepository
{
    
    public function RepDominio($nombre_dominio)
    {
        return Dominio::where('nombre', $nombre_dominio)
                    ->orderBy('id_dominio', 'asc')
                    ->get();
    }
    public function RepSeguros($tipo_seguro)
    {
        return Dominio::where('tipo_seguro', $tipo_seguro)
                    ->orderBy('nombre', 'desc')
                    ->get();
    }
    public function RepTipoSeguros($tipo_seguro)
    {
        return Seguro::where('tipo_seguro','=',$tipo_seguro)
                    ->orderBy('nombre', 'asc')
                    ->get();
    }
}