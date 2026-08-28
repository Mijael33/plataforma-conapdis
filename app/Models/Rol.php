<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'es_admin',
        'permisos',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'es_admin' => 'boolean',
            'activo' => 'boolean',
            'permisos' => 'array',
        ];
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function tienePermiso($area, $accion): bool
    {
        if ($this->es_admin) {
            return true;
        }

        $permisos = $this->permisos ?? [];
        return isset($permisos[$area]) && in_array($accion, $permisos[$area]);
    }
}