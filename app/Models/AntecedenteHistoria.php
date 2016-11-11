<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntecedenteHistoria extends Model
{
    //
    protected $table = 'paracelso.antecedentes_historia';
    protected $primaryKey='id_antecedente_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo_antecedente','descripcion','estado'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
