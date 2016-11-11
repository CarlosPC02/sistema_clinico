<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obstetrico extends Model
{
    //
    protected $table = 'paracelso.obstetricos';
    protected $primaryKey='id_obstetrico';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','fecha_menarca','ritmo','no_embarazos','no_partos','no_cesareas','no_abortos','observaciones','estado','fecha_um','fecha_up'];

    public function historia()
    {
    	return $this->belongsTo(HistoriaClinica::class,'id_historia','id_historia');
    }
}
