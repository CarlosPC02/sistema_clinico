<?php

namespace App\Http\Controllers\Historia;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\HistoriaClinica;

use App\Repositories\PersonaRepository;
use App\Repositories\DominioRepository;

use Carbon\Carbon;

class HistoriaControladorABM extends Controller
{
    protected $personas;
    protected $dominios;

    public function __construct(PersonaRepository $personas, DominioRepository $dominios)
    {
        $this->personas=$personas;
        $this->dominios=$dominios;
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
        //


        if($request->ajax())
        {

            $id_paciente=session('id_paciente');
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora($request,'200');
            $request->merge(['id_bitacora' => $id_bitacora]);
            $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
            $request->merge(['id_paciente' => $id_paciente]);

            $resultado=HistoriaClinica::create($request->all()); 

            if($resultado)
            {              
                $id = HistoriaClinica::all()->last()->id_historia;
                return response()->json(['success'=>'true','id'=>$id]);

            }
            else
            {
                return response()->json(['success'=>'false']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // verifica si existe o no la historia 
        $fechaA = Carbon::now()->format('Y-m-d');
        $horaA = Carbon::now()->format('H:m:s');
        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);
        $tipos=$this->dominios->RepDominio("TIPO ALERGIA");
        $tipoa=$this->dominios->RepDominio("TIPO ANTECEDENTE");

        $historia = HistoriaClinica::where('id_paciente','=',$id)->first();

        if ($historia != null)
        {
            return view('Historia.FrmVerHistoria',['historia'=>$historia,'tipos'=>$tipos,'tipoa'=>$tipoa]);
        }
        else
        {          
            return view('Historia.FrmCrearHistoria',['medicos'=>$medicos,'tipos'=>$tipos,'fecha'=>$fechaA,'hora'=>$horaA,'tipoa'=>$tipoa]);
        }

        
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
