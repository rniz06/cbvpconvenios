<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtInstitucion extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_instituciones';
}
