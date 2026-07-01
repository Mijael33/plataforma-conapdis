<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaTiempo extends Model
{
    use HasFactory;

    protected $table = 'linea_tiempo';

    protected $fillable = [
        'anio',
        'titulo',
        'descripcion',
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