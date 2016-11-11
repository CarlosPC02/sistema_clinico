<?php

namespace App\Http\Controllers\Paciente;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\DominioRepository;
use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Paciente;
use App\Models\Persona;

class PacienteControladorABM extends Controller
{
    private $bitacora;
    protected $dominios;
    public function __construct(DominioRepository $dominios)
    {
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
        // $this->validate($request, ['seguro' => 'required|max:10',
        //                             'matricula' => 'required|max:50',
        //                             'religion' => 'required|max:50',
        //                             'observaciones' => 'required|max:50',
        // ]);
        
        // $paciente= new Paciente;
        // $paciente->id_persona= $request->id_persona;
        // $paciente->codigo_institucion=$request->user()->codigo_institucion;
        // $paciente->matricula_seguro=strtoupper($request->matricula);
        // $paciente->codigo_seguro=strtoupper($request->seguro);
        // $paciente->religion=strtoupper($request->religion);
        // $paciente->observaciones=strtoupper($request->observaciones);
        // $paciente->estado="AC";
        // $paciente->save();
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
        $tipos_seguros=$this->dominios->RepDominio("TIPO SEGURO");

        $paciente = Paciente::where('id_persona','=',$id)->first();

        return view('Paciente.FrmEditarPaciente', ['tipos_seguros' => $tipos_seguros,'paciente'=>$paciente]);
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
        $codigo_transaccion='100';
        if($codigo_transaccion == '') {$codigo_transaccion='100';}

        //VALIDACION VA EN EL PERSONAREQUEST...

        $persona = Persona::with('Paciente')->FindOrFail($id);
        
        $bitacora = new BitacoraControlador;
        $id_bitacora= $bitacora->generar_bitacora($request,'801');
        $request->merge([ 'id_bitacora' => $id_bitacora ]);
        $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);

        $datos = $request->all();
        $persona->paciente->fill($datos)->save();
        
        return redirect()->route('SeleccionarPersona',['id_persona'=>$persona->id_persona,'nombre'=>$persona->nombre,'ap_paterno'=>$persona->ap_paterno,'fecha_nacimiento'=>$persona->fecha_nacimiento,'codigo_transaccion'=>$codigo_transaccion]);
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
