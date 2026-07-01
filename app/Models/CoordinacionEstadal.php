<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinacionEstadal extends Model
{
    use HasFactory;

    protected $table = 'coordinaciones_estadales';

    protected $fillable = [
        'estado',
        'direccion',
        'coordinador',
        'enlace_mapa',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }
}