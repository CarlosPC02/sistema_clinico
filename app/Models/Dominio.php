<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    //
    protected $table = 'paracelso.pa_dominios';
    protected $primaryKey='id_dominio';
    public $timestamps = false;
    protected $fillable = ['nombre','codigo_dominio','descripcion','estado'];
}
