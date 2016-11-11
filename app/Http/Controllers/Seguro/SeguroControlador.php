<?php

namespace App\Http\Controllers\Seguro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DominioRepository;

class SeguroControlador extends Controller
{
	protected $dominios;
    public function __construct(DominioRepository $dominios)
    {
        $this->dominios=$dominios;
    }
    //
    protected function ObtenerSeguros(Request $request)
    {	
    	$seguros=$this->dominios->RepTipoSeguros($request->tipo_seguro);

        return view('Seguro.LstSeguros',['seguros'=>$seguros]);
    }
}
