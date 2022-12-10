<?php

namespace App\Http\Controllers\Seguro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DominioRepository;

//Modificacion de archivo
use App\Models\Seguro;
use App\Http\Controllers\Administracion\BitacoraControlador;
//Modificacion de archivo

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

    //Modificacion de archivo
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguros=Seguro::all();
        return view('Seguro.LstSeguros')->with('seguros', $seguros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //redirige al formulario
    {
        //
        return view('Seguro.FrmCrearSeguros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Registre los datos en db
    {
        //
        $codigo_transaccion=session('codigo_transaccion');
        //no se conoce el codigo de institucion para registro de intituciones
        $bitacora = new BitacoraControlador;

        //$idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);

        Seguro::create($request->all());

        //Retorno los valores a 000.....
        $codigo_transaccion="000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        
        return redirect()->route('seguro.index');
    }

    //Editar
    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id_seguro
     * @return \Illuminate\Http\Response
     */
    public function edit($id_seguro) //redirige al formulario
    {
        $seguro=Seguro::find($id_seguro);
        return view('Seguro.FrmEditarSeguros')->with('seguro', $seguro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_seguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_seguro)
    {
        //
        $seguro = Seguro::FindOrFail($id_seguro);

        $bitacora = new BitacoraControlador;
        //$idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);

        //Captura y guarda datos
        $datos = $request->all();
        $seguro->fill($datos)->save();

        return redirect()->route('seguro.index');
    }
    //Editar

     //Eliminar
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_seguro
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id_seguro)
    {
        $seguro=Seguro::find($id_seguro);

        $bitacora = new BitacoraControlador;
        //$idbitacora = $bitacora->generar_bitacora($request,$codigo_transaccion);

        //Captura y guarda datos
        $seguro->estado = 'INC';
        //$institucion->fill($datos)->save();
        $seguro->save();

        return redirect()->route('seguro.index');
    }
    //Eliminar


    //Modificacion de archivo



}
