<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenLaboratorioResultado extends Model
{
    //
    protected $table = 'resultados_laboratorios';
    protected $primaryKey = 'id_resultado_laboratorio';
    public $timestamps = false;

    protected $fillable = ['id_orden_laboratorio','id_bitacora','fecha','resultado','estado'];

    public function ordenlaboratorio()
    {
    	return $this->belongsTo(OrdenLaboratorio::class,'id_orden_laboratorio','id_orden_laboratorio');
    }
}
