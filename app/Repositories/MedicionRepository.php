<?php

namespace App\Repositories;

use App\Models\Persona;
use App\Models\Medicion;
use Carbon\Carbon;
use DB;

class MedicionRepository
{
	public function RepMedicionBuscar($id_persona)
	{
        
        return Medicion::select('mediciones.id_medicion','mediciones.id_persona','mediciones.fecha','mediciones.antecedentes','mediciones.observaciones','mediciones.presion_diastolica','mediciones.presion_sistolica','mediciones.frecuencia_cardiaca','mediciones.frecuencia_respiratoria','mediciones.temperatura','mediciones.peso','mediciones.estatura','mediciones.estado','mediciones.imc','mediciones.spo2','mediciones.dolor')
            -> join('personas','personas.id_persona','=','mediciones.id_persona')
            -> where('mediciones.id_persona','=',$id_persona)
            ->get();


                // return Cita::select('citas.id_medico','citas.id_persona','citas.fecha','citas.hora','citas.motivo','medicos.id_medico','medicos.nombrem','medicos.apellidom','personas.nombre','personas.ap_paterno','personas.ap_materno','personas.codigo_institucion')
  //       ->join(DB::raw("(SELECT medicos.id_medico, medicos.id_persona, personas.nombre as nombreM, personas.ap_paterno as apellidoM FROM medicos INNER JOIN personas ON personas.id_persona = medicos.id_persona) as medicos"),function($q){
  //           $q->on('medicos.id_medico','=','citas.id_medico');
  //       })
  //       ->join('personas','personas.id_persona','=','citas.id_persona')
  //       ->where('personas.codigo_institucion','=',$codigo_institucion)
  //       ->where($busca)     
  //       ->orderBy('citas.hora','asc')
  //       ->get();

	}
}