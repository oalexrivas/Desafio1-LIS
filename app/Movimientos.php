<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    public function tiposmovimientos()
    {
        return $this->hasOne('App\Tiposmovimientos', 'id', 'idTipo');
    }
}
