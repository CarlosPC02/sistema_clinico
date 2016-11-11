<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoPatologico extends Model
{
    //
    protected $table = 'paracelso.no_patologicos';
    protected $primaryKey='id_no_patologico';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo_habito','descripcionh','estado'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
