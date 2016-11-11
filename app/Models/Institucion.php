<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    //
    protected $table = 'pa_instituciones';
    protected $primaryKey = 'id_institucion';
    public $timestamps = false;

    protected $fillable = ['codigo_institucion','tipo_institucion','nombre','descripcion','direccion','estado'];

    public function usuario()
    {
    	return $this->hasMany(User::class);
    }
}
