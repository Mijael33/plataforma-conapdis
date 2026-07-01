<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitucionAliada extends Model
{
    protected $table = 'instituciones_aliadas';
    
    protected $fillable = [
        'nombre',
        'imagen',
        'vinculo',
        'orden',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}