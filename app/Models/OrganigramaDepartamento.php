<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganigramaDepartamento extends Model
{
    use HasFactory;

    protected $table = 'organigrama_departamentos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'color',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    public function personas()
    {
        return $this->hasMany(OrganigramaPersona::class, 'departamento_id')->orderBy('orden', 'asc');
    }
}