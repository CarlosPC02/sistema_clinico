<?php

namespace App\Repositories;

use App\Models\Persona;
use App\Models\Medico;
use App\Models\Cita;
use Carbon\Carbon;
use DB;

class CitaRepository
{
	public function RepCitaBuscar($codigo_institucion,$fecha,$hora,$medico)
	{
        $fechaA = Carbon::now()->format('Y-m-d');

        $busca=[];

        if($fecha)
        {
            if($hora)
            { 
                if($medico){ $busca = ['citas.fecha'=>$fecha,'citas.hora'=>$hora,'citas.id_medico'=>$medico]; }
                else{ $busca = ['citas.fecha'=>$fecha,'citas.hora'=>$hora]; }
            }
            else
            {
                if($medico){ $busca = ['citas.fecha'=>$fecha,'citas.id_medico'=>$medico]; }
                else { $busca = ['citas.fecha'=>$fecha]; }
            }            
        }
        else { $busca = ['citas.fecha'=>$fechaA]; }

		return Cita::select('citas.id_cita','citas.id_medico','citas.id_persona','citas.fecha','citas.hora','citas.motivo','citas.estado','medicos.id_medico','medicos.nombrem','medicos.apellidom','personas.id_persona','personas.nombre','personas.ap_paterno','personas.ap_materno','personas.codigo_institucion')
        ->join(DB::raw("(SELECT medicos.id_medico, medicos.id_persona, personas.nombre as nombreM, personas.ap_paterno as apellidoM FROM medicos INNER JOIN personas ON personas.id_persona = medicos.id_persona) as medicos"),function($q){
            $q->on('medicos.id_medico','=','citas.id_medico');
        })
        ->join('personas','personas.id_persona','=','citas.id_persona')
        ->where('personas.codigo_institucion','=',$codigo_institucion)
        ->where('citas.estado','!=','TCEC')
        ->where($busca)     
        ->orderBy('citas.hora','asc')
        ->get();
        
	}

    public function RepCitaEditar($id)
    {
        return Cita::select('citas.id_medico','citas.id_persona','citas.fecha','citas.hora','citas.motivo','citas.estado','medicos.id_medico','medicos.nombrem','medicos.apellidom','personas.nombre','personas.ap_paterno','personas.ap_materno','personas.codigo_institucion')
        ->join(DB::raw("(SELECT medicos.id_medico, medicos.id_persona, personas.nombre as nombreM, personas.ap_paterno as apellidoM FROM medicos INNER JOIN personas ON personas.id_persona = medicos.id_persona) as medicos"),function($q){
            $q->on('medicos.id_medico','=','citas.id_medico');
        })
        ->join('personas','personas.id_persona','=','citas.id_persona')
        ->where('citas.id_cita','=',$id)
        ->first();
    }
}