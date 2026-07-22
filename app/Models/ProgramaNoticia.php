<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaNoticia extends Model
{
    use HasFactory;

    protected $table = 'programas_noticias';

    protected $fillable = [
        'nombre',
        'slug',
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