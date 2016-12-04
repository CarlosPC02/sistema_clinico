<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoConsulta extends Model
{
    //
    protected $table = 'diagnosticos';
    protected $primaryKey = 'id_diagnostico';
    public $timestamps = false;

    protected $fillable = ['id_evaluacion','id_bitacora','tipo_diagnostico','codigo_cie','descripcion','estado'];

    public function evaluacion()
    {
    	return $this->belongsTo(Evaluacion::class,'id_evaluacion','id_evaluacion');
    }
}
