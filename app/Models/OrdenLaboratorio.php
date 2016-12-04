<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenLaboratorio extends Model
{
    //
    protected $table = 'ordenes_laboratorios';
    protected $primaryKey = 'id_orden_laboratorio';
    public $timestamps = false;

    protected $fillable = ['id_consulta','id_bitacora','tipo_laboratorio','orden','historia','fecha','estado','urgente'];

    public function consulta()
    {
    	return $this->belongsTo(Consulta::class,'id_consulta','id_consulta');
    }
}
