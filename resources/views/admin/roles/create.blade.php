@extends('layouts.admin')

@section('titulo', 'Crear Rol')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Crear Nuevo Rol</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.roles.store') }}" method="POST" id="formRol">
            @csrf
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nombre del Rol *</label>
                    <input type="text" name="nombre" class="form-control rounded-3" value="{{ old('nombre') }}" required placeholder="Ej: Editor de Noticias">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Descripción</label>
                    <input type="text" name="descripcion" class="form-control rounded-3" value="{{ old('descripcion') }}" placeholder="Descripción breve del rol">
                </div>
                <div class="col-md-4">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="es_admin" id="es_admin" value="1" class="form-check-input" {{ old('es_admin') ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="es_admin">👑 Es Administrador Total</label>
                    </div>
                </div>
            </div>

            <div id="permisosSection">
                <h5 class="mb-3" style="color: #1a3b5d; font-weight: 700;">Permisos por Área</h5>
                <p class="text-muted" style="font-size: 0.85rem;">Selecciona las acciones permitidas para cada área.</p>

                @foreach($areas as $areaKey => $areaNombre)
                <div class="card border-0 shadow-sm rounded-3 mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h6 class="mb-0 fw-bold" style="color: #003097;">{{ $areaNombre }}</h6>
                            <div class="d-flex gap-2">
                                @if($areaKey === 'dashboard')
                                    {{-- Acciones especiales para dashboard --}}
                                    @foreach($accionesDashboard as $accion)
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               name="permisos[{{ $areaKey }}][]" 
                                               value="{{ $accion }}" 
                                               id="perm_{{ $areaKey }}_{{ $accion }}"
                                               class="form-check-input">
                                        <label class="form-check-label" for="perm_{{ $areaKey }}_{{ $accion }}" style="font-size: 0.85rem;">
                                            @if($accion === 'ver_metricas')
                                                Ver Métricas
                                            @elseif($accion === 'gestionar_mantenimiento')
                                                Gestionar Mantenimiento y Respaldo
                                            @else
                                                {{ $accion }}
                                            @endif
                                        </label>
                                    </div>
                                    @endforeach
                                @else
                                    {{-- Acciones estándar --}}
                                    @foreach($acciones as $accion)
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               name="permisos[{{ $areaKey }}][]" 
                                               value="{{ $accion }}" 
                                               id="perm_{{ $areaKey }}_{{ $accion }}"
                                               class="form-check-input">
                                        <label class="form-check-label text-capitalize" for="perm_{{ $areaKey }}_{{ $accion }}" style="font-size: 0.85rem;">
                                            {{ $accion }}
                                        </label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Guardar Rol</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('es_admin').addEventListener('change', function() {
    const permisosSection = document.getElementById('permisosSection');
    if (this.checked) {
        permisosSection.style.display = 'none';
    } else {
        permisosSection.style.display = 'block';
    }
});

// Trigger on load
if (document.getElementById('es_admin').checked) {
    document.getElementById('permisosSection').style.display = 'none';
}
</script>
@endsection