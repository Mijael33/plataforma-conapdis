<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganigramaPersona extends Model
{
    use HasFactory;

    protected $table = 'organigrama_personas';

    protected $fillable = [
        'departamento_id',
        'nombre',
        'apellido',
        'cargo',
        'descripcion',
        'imagen',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    public function departamento()
    {
        return $this->belongsTo(OrganigramaDepartamento::class, 'departamento_id');
    }
}