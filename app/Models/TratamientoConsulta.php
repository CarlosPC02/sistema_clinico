<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TratamientoConsulta extends Model
{
    //
    protected $table = 'tratamientos';
    protected $primaryKey = 'id_tratamiento';
    public $timestamps = false;

    protected $fillable = ['id_consulta','id_bitacora','tipo_tratamiento','prescripcion','codigo_medicamento','fecha','estado'];

    public function consulta()
    {
    	return $this->belongsTo(Consulta::class,'id_consulta','id_consulta');
    }
}
