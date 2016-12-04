<?php

namespace App\Http\Controllers\Consulta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Consulta;

use App\Repositories\PersonaRepository;
use App\Repositories\DominioRepository;

use Carbon\Carbon;

class ConsultaControladorABM extends Controller
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
        $fechaA = Carbon::now()->format('Y-m-d');
        return view('Consulta.FrmOpcionConsulta',['fecha'=>$fechaA]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fechaA = Carbon::now()->format('Y-m-d');
        $horaA = Carbon::now()->format('H:m:s');

        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);
        $tipos=$this->dominios->RepDominio("TIPO CONSULTA");
        $tiposd=$this->dominios->RepDominio("TIPO DIAGNOSTICO");
        $tiposl=$this->dominios->RepDominio("TIPO LABORATORIO");
        $tiposg=$this->dominios->RepDominio("TIPO GABINETE");
        $tipost=$this->dominios->RepDominio("TIPO TRATAMIENTO");
        $medicamentos=$this->dominios->RepMedicamentos();

        return view('Consulta.FrmCrearConsulta',['medicos'=>$medicos,'tipos'=>$tipos,'fecha'=>$fechaA,'hora'=>$horaA,'tiposd'=>$tiposd,'tiposl'=>$tiposl,'tiposg'=>$tiposg,'tipost'=>$tipost,'medicamentos'=>$medicamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaF = Carbon::now()->format('Y-m-d');
        $horaF = Carbon::now()->format('H:m:s');
        //
        if($request->ajax())
        {

            $id_paciente=session('id_paciente');
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora($request,'600');
            $request->merge(['id_bitacora' => $id_bitacora]);
            $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
            $request->merge(['id_paciente' => $id_paciente]);
            $request->merge(['fecha_fin'=>$fechaF]);
            $request->merge(['hora_fin'=>$horaF]);

            $resultado=Consulta::create($request->all()); 

            if($resultado)
            {              
                $id = Consulta::all()->last()->id_consulta;
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
        $fechaA = Carbon::now()->format('Y-m-d');
        //verificar la fecha de la consulta
        $consulta = Consulta::where('fecha_fin','=',$fechaA)
        ->where('id_paciente','=',$id)
        ->first();

        if ($consulta != null)
        {
            //ya existe una consulta concluida para esta fecha
            //se puede editar la consulta
            return view('Consulta.FrmOpcionConsulta',['fecha'=>$fechaA,'idc'=>$consulta->id_consulta]);
        }
        else
        {
            //no existe la consulta para la fecha
            //se abre nuevo formulario
            return redirect()->route('consulta.create');
            
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
        $consulta = Consulta::FindOrFail($id);


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
