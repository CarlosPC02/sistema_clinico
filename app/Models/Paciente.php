<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'paracelso.pacientes';
    protected $primaryKey='id_paciente';
    public $timestamps = false;
    protected $fillable = ['id_persona','codigo_institucion','codigo_seguro','matricula_seguro','religion','observaciones','estado'];
  	
	public function persona()
    {
		return $this -> belongsTo(Persona::class,'id_persona','id_persona');
    }

    public function historia()
    {
        return $this->hasOne(Historia::class,'id_paciente','id_paciente');
    }
}
