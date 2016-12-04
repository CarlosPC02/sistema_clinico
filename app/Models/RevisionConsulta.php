<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevisionConsulta extends Model
{
    //
    protected $table = 'revisiones_consulta';
    protected $primaryKey = 'id_revision_consulta';
    public $timestamps = false;

    protected $fillable = ['id_consulta','id_bitacora','revision_general','cabeza_cuello','torax','miembros_superiores','abdomen','miembros_inferiores','genital_urinario','neurologico','otros','estado'];

    public function consulta()
    {
    	return $this->belongsTo(Consulta::class,'id_consulta','id_consulta');
    }
}
