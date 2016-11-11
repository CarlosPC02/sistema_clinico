<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TratamientoHistoria extends Model
{
    //
    protected $table = 'paracelso.tratamientos_historia';
    protected $primaryKey='id_tratamiento_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tratamiento','causa_tratamiento','modo_tratamiento','estado'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
