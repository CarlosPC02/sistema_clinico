<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    protected $table = 'pa_medicamentos';
    protected $primaryKey = 'id_medicamento';
    public $timestamps = false;

    protected $fillable = ['codigo_medicamento','nombre_comercial','nombre_medico','codigo_marca','presentacion','estado','tipo_medicamento','posologia'];
}
