@extends('layouts.admin')

@section('titulo', 'Nueva Coordinación Estadal')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Nueva Coordinación Estadal</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.coordinaciones.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Estado</label>
                    <input type="text" name="estado" class="form-control rounded-3" value="{{ old('estado') }}" required placeholder="Ej: Amazonas">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Coordinador(a)</label>
                    <input type="text" name="coordinador" class="form-control rounded-3" value="{{ old('coordinador') }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ old('orden', 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Dirección</label>
                    <textarea name="direccion" class="form-control rounded-3" rows="2" required>{{ old('direccion') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Enlace de Google Maps (opcional)</label>
                    <input type="url" name="enlace_mapa" class="form-control rounded-3" value="{{ old('enlace_mapa') }}" placeholder="https://maps.app.goo.gl/...">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" checked>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Guardar</button>
                    <a href="{{ route('admin.coordinaciones.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection