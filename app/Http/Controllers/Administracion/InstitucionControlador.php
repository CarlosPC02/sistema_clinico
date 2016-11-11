<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Institucion;

use App\Http\Controllers\Administracion\BitacoraControlador;

class InstitucionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instituciones = Institucion::all();
        return view('Institucion.LstInstitucion')->with('instituciones',$instituciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Institucion.FrmCrearInstitucion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $codigo_transaccion=session('codigo_transaccion');
        //no se conoce el codigo de institucion para registro de intituciones
        $bitacora = new BitacoraControlador;

        $idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);

        Institucion::create($request->all());

        //Retorno los valores a 000.....
        $codigo_transaccion="000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        
        return redirect()->route('institucion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
