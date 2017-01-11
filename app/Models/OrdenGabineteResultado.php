<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenGabineteResultado extends Model
{
    //
    protected $table = 'resultados_gabinetes';
    protected $primaryKey = 'id_resultado_gabinete';
    public $timestamps = false;

    protected $fillable = ['id_orden_gabinete','id_bitacora','fecha','resultado','estado'];

    public function ordengabinete()
    {
    	return $this->belongsTo(OrdenGabinete::class,'id_orden_gabinete','id_orden_gabinete');
    }
}
