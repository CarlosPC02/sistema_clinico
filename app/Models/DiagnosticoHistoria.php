<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoHistoria extends Model
{
    //
    protected $table = 'paracelso.diagnosticos_historia';
    protected $primaryKey='id_diagnostico_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','diagnostico','diagnostico_cie10','agudo_cronico','comentarios','estado'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
