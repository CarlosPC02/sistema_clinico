<?php

namespace App\Http\Controllers\Persona;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PersonaRequest;
use App\Http\Controllers\Controller;

use App\Models\Persona;
use App\Models\PersonaImagen;
use App\Models\Paciente;

use App\Http\Controllers\Administracion\BitacoraControlador;
use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;

class PersonaControladorABM extends Controller
{
    private $bitacora;
    protected $dominios;
    public function __construct(DominioRepository $dominios, PersonaRepository $personas)
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $codigo_transaccion = "100";
        // session(['codigo_transaccion' =>$codigo_transaccion]);
        $dominios=$this->dominios->RepDominio("TIPO DOCUMENTO");
        $tipos_seguros=$this->dominios->RepDominio("TIPO SEGURO");

        return view('Persona.FrmCrearPersona', ['dominios' => $dominios ,'tipos_seguros' => $tipos_seguros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        //
        $codigo_transaccion=session('codigo_transaccion');
        if($codigo_transaccion == '') {$codigo_transaccion='100';}

        //VALIDACION VA EN EL PERSONAREQUEST...

        
        $bitacora = new BitacoraControlador;
        $id_bitacora= $bitacora->generar_bitacora($request,'100');
        $request->merge([ 'id_bitacora' => $id_bitacora ]);
        $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);

        $persona = Persona::create($request->all());
        $persona->paciente()->create($request->all());
        
        //ESTE CODIGO HACE EL TRUCO DE REDIRECCIONAR AL LUGAR INDICADO PARA CONTINUAR LA TRANSACCION...

        return redirect()->route('SeleccionarPersona',['id_persona'=>$persona->id_persona,'nombre'=>$persona->nombre,'ap_paterno'=>$persona->ap_paterno,'fecha_nacimiento'=>$persona->fecha_nacimiento,'codigo_transaccion'=>$codigo_transaccion]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_transaccion)
    {
        //
        if($codigo_transaccion == 'show') {$codigo_transaccion='100';}
        //session(['codigo_transaccion' =>$codigo_transaccion]);
        return view('Persona.FrmBuscarPersonas',['codigo'=>$codigo_transaccion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persona)
    {
        //MOSTRAR LOS DATOS DE LA PERSONA...
        $persona=Persona::FindOrFail($id_persona);
        $dominios=$this->dominios->RepDominio("TIPO DOCUMENTO");
        $tipos_seguros=$this->dominios->RepDominio("TIPO SEGURO");
        //$imagenpersona = PersonaImagen::where('id_persona','=',$id_persona)->get();

        //return view('Persona.LstDatosPersona',['persona'=>$persona]);
        return view('Persona.FrmEditarPersona', ['dominios' => $dominios ,'tipos_seguros' => $tipos_seguros,'persona'=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaRequest $request, $id)
    {
        //
        $codigo_transaccion='100';
        if($codigo_transaccion == '') {$codigo_transaccion='100';}

        //VALIDACION VA EN EL PERSONAREQUEST...

        $persona = Persona::FindOrFail($id);
        
        $bitacora = new BitacoraControlador;
        $id_bitacora= $bitacora->generar_bitacora($request,'101');
        $request->merge([ 'id_bitacora' => $id_bitacora ]);
        $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);

        $datos = $request->all();
        $persona->fill($datos)->save();
        
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
