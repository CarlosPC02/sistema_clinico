<?php

namespace App\Http\Controllers\OrdenesG;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\OrdenGabinete;
use App\Models\Consulta;

use App\Repositories\DominioRepository;
use App\Repositories\OrdenRepository;

class OrdenesGControladorABM extends Controller
{
    protected $dominios;
    protected $ordenes;

    public function __construct(DominioRepository $dominios, OrdenRepository $ordenes)
    {
        $this->dominios = $dominios;
        $this->ordenes = $ordenes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id=$request->id_consulta;
        $ordenes=OrdenGabinete::where('id_consulta','=',$id)
            ->where('estado','=','AC')
            ->get();

        return view('OrdenesG.LstOrdenesG',['ordenes'=>$ordenes]);
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
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora($request,'650');
            $request->merge(['id_bitacora' => $id_bitacora]);

            $resultado=OrdenGabinete::create($request->all());

            if($resultado)
            {
                return response()->json(['success'=>'true']);
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
    public function show($id_paciente)
    {
        //Listado de ordenes de gabinete del paciente
         $ordenes=OrdenGabinete::where('id_consulta','=',"8") //por mientras codigo fijo 8
             ->where('estado','=','AC')
             ->orderby('fecha','=','DESC')
             ->get();
             
        // $paciente = $id_paciente;
        // $ordenes = $this->ordenes->RepOrdenGabineteBuscar($paciente);

        return view('OrdenesG.LstOrdenGResultado',['ordenes'=>$ordenes]);
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
        $registro = OrdenGabinete::FindOrFail($id);
        $registro->estado = 'DC';
        $registro->save();

        if($registro)
        {
            return response()->json(['success'=>'true']);
        }
        else
        {
            return response()->json(['success'=>'false']);
        }
    }
}
