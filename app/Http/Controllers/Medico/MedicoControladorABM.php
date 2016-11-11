<?php

namespace App\Http\Controllers\Medico;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Medico;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;

class MedicoControladorABM extends Controller
{
    protected $dominios;
    protected $personas;

    public function __construct(DominioRepository $dominios,PersonaRepository $personas)
    {
        $this->dominios=$dominios;
        $this->personas=$personas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicos=$this->personas->RepMedico(Auth()->user()->codigo_institucion);
        return view('Medico.LstMedicos',['medicos'=>$medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigo_transaccion = "400";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        return redirect()->route('persona.show',[$codigo_transaccion]);
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

        $bitacora = new BitacoraControlador;

        $idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);
        
        Medico::create($request->all());
        
        //Retorno los valores a 000.....
        $codigo_transaccion="000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        
        return redirect()->route('medico.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_persona)
    {
        //
        $codigo_institucion=Auth()->user()->codigo_institucion;
        $especialidades = $this->dominios->RepDominio('TIPO ESPECIALIDAD');

        //$persona = Persona::FindOrFail($id);
        return view('Medico.FrmCrearMedico',['id_persona'=>$id_persona,'institucion'=>$codigo_institucion,'especialidades'=>$especialidades]);
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
