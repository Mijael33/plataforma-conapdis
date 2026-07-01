<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoCertificacion extends Model
{
    use HasFactory;

    protected $table = 'puntos_certificacion';

    protected $fillable = [
        'estado',
        'ubicacion',
        'fecha',
        'hora',
        'hora_fin',
        'dias',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'fecha' => 'date',
        ];
    }

    public function getUbicacionesArrayAttribute(): array
    {
        if (empty($this->ubicacion)) {
            return [''];
        }
        return explode("\n\n", $this->ubicacion);
    }

    public function getHoraFormateadaAttribute(): ?string
    {
        if (!$this->hora) return null;
        return date('h:i A', strtotime($this->hora));
    }

    public function getHoraFinFormateadaAttribute(): ?string
    {
        if (!$this->hora_fin) return null;
        return date('h:i A', strtotime($this->hora_fin));
    }

    /**
     * Obtener los días como array
     */
    public function getDiasArrayAttribute(): array
    {
        if (empty($this->dias)) {
            return [];
        }
        return explode(', ', $this->dias);
    }
}