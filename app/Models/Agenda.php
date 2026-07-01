<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'titulo',
        'slug',
        'extracto',
        'contenido',
        'fecha',
        'hora',
        'lugar',
        'imagen',
        'publicado',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'publicado' => 'boolean',
        ];
    }
}