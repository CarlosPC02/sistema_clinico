<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    //
    protected $table = 'historias_clinicas';
    protected $primaryKey = 'id_historia';
    public $timestamps = false;

    protected $fillable = ['id_medico','id_bitacora','id_paciente','codigo_institucion','fecha','hora','nota','grupo_sanguineo','estado'];

    public function medico()
    {
    	return $this->belongsTo(Medico::class,'id_medico','id_medico');
    }

    public function paciente()
    {
    	return $this->belongsTo(Paciente::class,'id_paciente','id_paciente');
    }

    public function alergia()
    {
        return $this->hasOne(Alergia::class,'id_historia','id_historia');
    }

    public function antecedentehistoria()
    {
        return $this->hasOne(AntecedenteHistoria::class,'id_historia','id_historia');
    }

    public function diagnosticohistoria()
    {
        return $this->hasOne(DiagnosticoHistoria::class,'id_historia','id_historia');
    }

    public function nopatologico()
    {
        return $this->hasOne(NoPatologico::class,'id_historia','id_historia');
    }

    public function obstetrico()
    {
        return $this->hasOne(Obstetrico::class,'id_historia','id_historia');
    }

    public function tratamientohistoria()
    {
        return $this->hasOne(TratamientoHistoria::class,'id_historia','id_historia');
    }
}
