<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    //
    protected $table = 'paracelso.alergias';
    protected $primaryKey='id_alergia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo_alergia','severidad','agente','estado'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
