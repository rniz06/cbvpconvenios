<?php

namespace App\Models\Vistas;

use App\Models\Convenio;
use Illuminate\Database\Eloquent\Model;

class VtPersonal extends Model
{
    protected $connection = "db_personal";

    protected $table = "vt_personales";

    protected $primaryKey = 'idpersonal';

    // Relacion Inversa
    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }
}
