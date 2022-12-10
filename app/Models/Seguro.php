<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    //
    protected $table = 'paracelso.pa_seguros';
    public $timestamps = false;
    protected $primaryKey='id_seguro';
	//protected $fillable = ['codigo_seguro','tipo_seguro','nombre','estado'];
	protected $fillable = ['tipo_seguro','nombre','estado'];
}
