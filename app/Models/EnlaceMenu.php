<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnlaceMenu extends Model
{
    protected $table = 'enlaces_menu';
    
    protected $fillable = [
        'titulo',
        'vinculo',
        'orden',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}