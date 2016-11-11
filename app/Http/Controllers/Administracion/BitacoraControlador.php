<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;

class BitacoraControlador extends Controller
{
    //
    public function generar_bitacora(Request $request,$codigo_transaccion)
    {	
    	$bitacora= new Bitacora;
    	$bitacora->id_usuario=$request->user()->id;//reemplazar este codigo con variable de session
        $bitacora->codigo_transaccion=$codigo_transaccion; //$codigo_transaccion'';
    	$bitacora->fecha=date('d-m-Y h:i:s');
    	$bitacora->estado='AC';
        $bitacora->codigo_institucion=$request->user()->codigo_institucion;
        $bitacora->save();
        return $bitacora->id_bitacora;
    }
}
