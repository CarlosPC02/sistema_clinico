<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenGabinete extends Model
{
    //
    protected $table = 'ordenes_gabinetes';
    protected $primaryKey = 'id_orden_gabinete';
    public $timestamps = false;

    protected $fillable = ['id_consulta','id_bitacora','tipo_gabinete','orden','historia','fecha','complemento','urgente','estado'];

    public function consulta()
    {
    	return $this->belongsTo(Consulta::class,'id_consulta','id_consulta');
    }
}
