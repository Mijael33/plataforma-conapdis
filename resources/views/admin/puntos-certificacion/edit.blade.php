@extends('layouts.admin')

@section('titulo', 'Editar Punto de Certificación')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Punto de Certificación</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.puntos-certificacion.update', $puntos_certificacion) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Estado</label>
                    <input type="text" name="estado" class="form-control rounded-3" value="{{ old('estado', $puntos_certificacion->estado) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Fecha</label>
                    <input type="date" name="fecha" class="form-control rounded-3" value="{{ old('fecha', $puntos_certificacion->fecha->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Hora Inicio</label>
                    <input type="time" name="hora" class="form-control rounded-3" value="{{ old('hora', $puntos_certificacion->hora) }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Hora Fin</label>
                    <input type="time" name="hora_fin" class="form-control rounded-3" value="{{ old('hora_fin', $puntos_certificacion->hora_fin) }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ old('orden', $puntos_certificacion->orden) }}">
                </div>

                {{-- Días de la semana --}}
                <div class="col-12">
                    <label class="form-label fw-bold">Días que aplican</label>
                    <div class="d-flex flex-wrap gap-3">
                        @php
                            $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                            $diasSeleccionados = old('dias') ?? $puntos_certificacion->dias_array;
                        @endphp
                        @foreach($diasSemana as $dia)
                        <div class="form-check">
                            <input type="checkbox" name="dias[]" value="{{ $dia }}" class="form-check-input" id="dia_{{ $loop->index }}" {{ in_array($dia, $diasSeleccionados) ? 'checked' : '' }}>
                            <label class="form-check-label" for="dia_{{ $loop->index }}">{{ $dia }}</label>
                        </div>
                        @endforeach
                    </div>
                    <small class="text-muted">Selecciona los días de la semana en que estará disponible este punto.</small>
                </div>
                
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold mb-0">Ubicaciones</label>
                        <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="agregarUbicacion()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Agregar ubicación
                        </button>
                    </div>
                    <div id="ubicaciones-container">
                        @php
                            $ubicacionesArray = old('ubicaciones') ?? $puntos_certificacion->ubicaciones_array;
                        @endphp
                        @foreach($ubicacionesArray as $ubi)
                        <div class="input-group mb-2 ubicacion-item">
                            <input type="text" name="ubicaciones[]" class="form-control rounded-3" value="{{ $ubi }}" required placeholder="Dirección completa del punto de certificación">
                            <button type="button" class="btn btn-outline-danger" onclick="eliminarUbicacion(this)" title="Eliminar ubicación">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <small class="text-muted">Puedes agregar múltiples ubicaciones para este punto de certificación.</small>
                </div>
                
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $puntos_certificacion->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.puntos-certificacion.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function agregarUbicacion() {
    var container = document.getElementById('ubicaciones-container');
    var div = document.createElement('div');
    div.className = 'input-group mb-2 ubicacion-item';
    div.innerHTML = `
        <input type="text" name="ubicaciones[]" class="form-control rounded-3" required placeholder="Dirección completa del punto de certificación">
        <button type="button" class="btn btn-outline-danger" onclick="eliminarUbicacion(this)" title="Eliminar ubicación">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    `;
    container.appendChild(div);
}

function eliminarUbicacion(btn) {
    var items = document.querySelectorAll('.ubicacion-item');
    if (items.length > 1) {
        btn.parentElement.remove();
    }
}
</script>
@endsection