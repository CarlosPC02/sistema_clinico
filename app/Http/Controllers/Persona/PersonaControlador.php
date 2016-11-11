<?php

namespace App\Http\Controllers\Persona;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PersonaRepository;
use App\Models\Persona;

class PersonaControlador extends Controller
{
    //
    protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }

    protected function BuscarPersona(Request $request)
    {
        $codigo_transaccion=$request->codigo; //CODIGO DE TRANSACCION
        $personas = $this->personas->BuscarPersonas($request->user()->codigo_institucion,$request->nombre,$request->ap_paterno,$request->ap_materno);

        return view('Persona.LstPersonas',['personas'=>$personas,'codigo'=>$codigo_transaccion]);
    }

    protected function SeleccionarPersona($id_persona,$codigo_transaccion)
    {
        $persona = $this->personas->ObtenerPersona(Auth()->user()->codigo_institucion,$id_persona);
        //return $persona;

        session(['id_persona' => $persona->id_persona]);
        session(['nombre_persona' => $persona->nombre.' '.$persona->ap_paterno]);
        session(['fecha_nacimiento' => $persona->fecha_nacimiento]);      
        
        //cargo en la sesion el id de paciente para utilizarlo en historia, consulta, labs y gabs
        session(['id_paciente'=>$persona->paciente->id_paciente]);
        
        //comprobar que existan datos de seguro
        if($persona->paciente->codigo_seguro !== null) { $resultado=1;}
        else { $resultado=0; }

        switch ($codigo_transaccion) {

            case '000': //ESTE CODIGO DE TRANSACCION ES EL DE LISTAR LAS PERSONAS DEBE IR A DETALLES DE PERSONA... EDITAR?
                //return redirect()->route('persona.edit',$id_persona);
                return view('Persona.FrmMenu',['resultado'=>$resultado]);

        	case '100': //ESTE CODIGO DE TRANSACCION ES EL DE LISTAR LAS PERSONAS DEBE IR A DETALLES DE PERSONA... EDITAR?
        		//return redirect()->route('persona.edit',$id_persona); //EN ESTE CASO PODRIA REDIRECCIONAR AL MENU DE TRABAJO CON EL PACIENTE/PERSONA 
                return view('Persona.FrmMenu',['resultado'=>$resultado]);           

            case '400': //CODIGO PARA CREAR NUEVO MEDICO
                return redirect()->route('medico.show',$id_persona);

            case '500': //EN ESTE CASO ESTE ES EL CODIGO DE TRANSACCION PROVISIONAL PARA CREAR NUEVA CITA
                return redirect()->route('cita.show',$id_persona);

            case '1000':
                return redirect()->route('usuario.show',$id_persona);

            break;
        }


        //return view('prueba');
    }

}
