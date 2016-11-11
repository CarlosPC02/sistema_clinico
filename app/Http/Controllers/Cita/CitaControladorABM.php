<?php

namespace App\Http\Controllers\Cita;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cita;

use App\Http\Controllers\Administracion\BitacoraControlador;

use Carbon\Carbon;

use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;
use App\Repositories\CitaRepository;

class CitaControladorABM extends Controller
{
    protected $dominios;
    protected $personas;
    protected $citas;

    public function __construct(DominioRepository $dominios, PersonaRepository $personas, CitaRepository $citas)
    {
        $this->dominios = $dominios;
        $this->personas = $personas;
        $this->citas = $citas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fechaA = Carbon::now()->format('Y-m-d');
        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);
        //$citas = $this->citas->RepCitaB(Auth()->user()->codigo_institucion);
        return view('Cita.FrmBuscarCitas',['citas'=>$this->citas->RepCitaBuscar(Auth()->user()->codigo_institucion,'','',''),'fecha'=>$fechaA,'medicos'=>$medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //DESDE AQUI ENVIO EL EL CODIGO DE TRANSACCION AL INDEX DE PERSONA...
        $codigo_transaccion="500"; //esto es crear cita nueva...
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
        //return $request;

        $codigo_transaccion=session('codigo_transaccion');

        $bitacora = new BitacoraControlador;

        $idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion); 

        $request->merge([ 'id_bitacora' => $idbitacora ]);
        Cita::create($request->all());

         //Retorno los valores a 000.....
        $codigo_transaccion="000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        
        return redirect()->route('cita.index');
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
        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);
        $codigo_institucion=Auth()->user()->codigo_institucion;

        
        return view('Cita.FrmCrearCita',['medicos'=>$medicos,'codigo'=>$codigo_institucion]);
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
