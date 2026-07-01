<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table = 'redes_sociales';
    
    protected $fillable = [
        'red',
        'nombre_cuenta',
        'vinculo',
        'destacado',
        'orden',
        'activo',
    ];

    protected $casts = [
        'destacado' => 'boolean',
        'activo' => 'boolean',
    ];
}