<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VtUsuario extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'vt_usuarios';
}
