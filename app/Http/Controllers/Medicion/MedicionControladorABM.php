<?php

namespace App\Http\Controllers\Medicion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Medicion;
use App\Models\Persona;

use Carbon\Carbon;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;
use App\Repositories\MedicionRepository;

class MedicionControladorABM extends Controller
{

    protected $dominios;
    protected $personas;
    protected $mediciones;

    /**
    * Constructor
    */
    public function __construct(DominioRepository $dominios, PersonaRepository $personas, MedicionRepository $mediciones)
    {
        $this->dominios = $dominios;
        $this->personas = $personas;
        $this->mediciones = $mediciones;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        // $this->validate($request, [
        //     'fecha' => 'required',
        //     'peso' => 'required|min:0.4|max:170.999',
        //     'estatura' => 'required|min:10|max:220.99',
        //     'presion_sistolica' => 'min:40|max:280',
        //     'presion_diastolica' => 'min:0|max:210',
        //     'frecuencia_cardiaca' => 'min:0|max:300',
        //     'frecuencia_respiratoria' => 'min:0|max:120',
        //     'temperatura' => 'min:0|max:45',
        //     'spo2' => 'min:0|max:100',
        //     'dolor' => 'min:0|max:10',
        // ]);
        //dd ($request);

        //se deberia cargar desde session
        $codigo_transaccion="700";
        $id_persona=session('id_persona');
        //session(['id_persona' =>$id_persona]);
        $bitacora = new BitacoraControlador;
        $idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);

        $request -> merge(['id_bitacora' => $idbitacora]);
        //
        //Medicion=$request->peso;
        //Medicion=$request->estatura;

        Medicion::create($request->all());
        
        //Retorno los valores a 000.....
        $codigo_transaccion="000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        
        return redirect()->route('medicion.show',[$id_persona]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_persona)
    {
        //Despliega los Signos Vitales de una persona
        $mediciones = Medicion::where('id_persona','=',$id_persona)
        ->orderBy('fecha','desc')
        ->get();

        $fechaA = Carbon::now()->format('d-m-Y');

        return view('medicion.LstMediciones',['mediciones'=>$mediciones,'fecha_actual'=>$fechaA]);
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
