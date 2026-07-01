<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'extracto',
        'contenido',
        'categoria',
        'tipo',
        'imagen',
        'fecha_publicacion',
        'publicado',
        'destacado_banner',
        'orden_banner',
    ];

    protected function casts(): array
    {
        return [
            'fecha_publicacion' => 'datetime',
            'publicado' => 'boolean',
            'destacado_banner' => 'boolean',
        ];
    }
}