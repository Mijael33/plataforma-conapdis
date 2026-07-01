<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'contenido',
        'imagen',
        'video_url',
        'link_curso',
        'fecha_inicio',
        'fecha_final',
        'publicado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_final' => 'date',
            'publicado' => 'boolean',
        ];
    }
}