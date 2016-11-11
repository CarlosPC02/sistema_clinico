<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    //
    protected $table = 'mediciones';
    protected $primaryKey = 'id_medicion';
    public $timestamps = false;

    protected $fillable = ['id_persona','id_bitacora','fecha','antecedentes','observaciones','presion_diastolica','presion_sistolica','frecuencia_cardiaca','frecuencia_respiratoria','temperatura','peso','estatura','imc','spo2','dolor','estado'];

    public function persona()
    {
    	return $this->belongTo(Persona::class,'id_persona','id_persona');
    }
}
