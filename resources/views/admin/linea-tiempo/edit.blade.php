@extends('layouts.admin')

@section('titulo', 'Editar Evento - Línea de Tiempo')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Evento Histórico</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.linea-tiempo.update', $lineaTiempo) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Año</label>
                    <input type="number" name="anio" class="form-control rounded-3" value="{{ old('anio', $lineaTiempo->anio) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ old('orden', $lineaTiempo->orden) }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Título</label>
                    <input type="text" name="titulo" class="form-control rounded-3" value="{{ old('titulo', $lineaTiempo->titulo) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control rounded-3" rows="4" required>{{ old('descripcion', $lineaTiempo->descripcion) }}</textarea>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $lineaTiempo->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.linea-tiempo.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection