<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_persona','id_medico','id_consultorio','codigo_institucion','motivo','historia','fecha','hora','estado'];

    public function persona()
    {
    	return $this->belongTo(Persona::class,'id_persona','id_persona');
    }

    public function medico()
    {
    	return $this->belongsTo(Medico::class,'id_medico','id_medico');
    }
}
