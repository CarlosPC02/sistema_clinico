<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table = 'bitacoras';
    public $timestamps = false;
    protected $primaryKey='id_bitacora';
}
