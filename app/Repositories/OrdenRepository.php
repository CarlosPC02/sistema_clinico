<?php

namespace App\Repositories;

use App\Models\Paciente;
use App\Models\Consulta;
use App\Models\OrdenGabinete;
use App\Models\OrdenLaboratorio;
use Carbon\Carbon;
use DB;

class OrdenRepository
{
  public function RepOrdenGabineteBuscar($id_paciente)
  {
        return OrdenGabinete::select('ordenes.id_orden_gabinete','ordenes.id_consulta','ordenes.tipo_gabinete','ordenes.orden','ordenes.fecha','ordenes.complemento','ordenes.urgente')
            -> join('consultas','consultas.id_consulta','=','ordenes.id_consulta')
            -> join('pacientes','pacientes.id_paciente','=','consulta.id_paciente')
            -> where('pacientes.id_paciente','=',$id_paciente)
            -> where('ordenes.estado','=','AC')
            -> orderby('ordenes.fecha','=','DESC')
            ->get();
  }

  public function RepOrdenLaboratorioBuscar($id_paciente)
  {
        return OrdenLaboratorio::select('mediciones.id_medicion','mediciones.id_persona','mediciones.fecha','mediciones.antecedentes','mediciones.observaciones','mediciones.presion_diastolica','mediciones.presion_sistolica','mediciones.frecuencia_cardiaca','mediciones.frecuencia_respiratoria','mediciones.temperatura','mediciones.peso','mediciones.estatura','mediciones.estado','mediciones.imc','mediciones.spo2','mediciones.dolor')
            -> join('personas','personas.id_persona','=','mediciones.id_persona')
            -> where('mediciones.id_persona','=',$id_persona)
            ->get();
  }
}