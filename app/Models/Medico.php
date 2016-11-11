<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
    protected $table = 'medicos';
    protected $primaryKey='id_medico';
    public $timestamps = false;

    protected $fillable = ['id_persona','codigo_institucion','codigo_especialidad','matricula_min_salud','matricula_col_medico','ranking','alma_mater','estado'];

    public function persona()
    {
    	return $this->belongsTo(Persona::class,'id_persona','id_persona');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class,'id_medico','id_medico');
    }
}
