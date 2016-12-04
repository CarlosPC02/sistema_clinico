<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_paciente','id_consultorio','id_medico','id_receptor','id_cita','codigo_institucion','tipo_consulta','motivo_consulta','historia','fecha_inicio','hora_inicio','fecha_fin','hora_fin','estado'];

    public function revision()
    {
    	return $this->hasOne(RevisionConsulta::class,'id_consulta','id_consulta');
    }

    public function evaluacion()
    {
    	return $this->hasOne(Evaluacion::class,'id_consulta','id_consulta');
    }

    public function ordengabinete()
    {
    	return $this->hasMany(OrdenGabinete::class,'id_consulta','id_consulta');
    }

    public function ordenlaboratorio()
    {
    	return $this->hasMany(OrdenLaboratorio::class,'id_consulta','id_consulta');
    }

    public function tratamiento()
    {
    	return $this->hasMany(TratamientoConsulta::class,'id_consulta','id_consulta');
    }
}
