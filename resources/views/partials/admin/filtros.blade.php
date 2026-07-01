<div class="filtros-bar p-3 mb-4" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <form action="{{ url()->current() }}" method="GET" class="row g-2 align-items-end">
        <div class="col-md-2">
            <label class="form-label fw-bold small mb-1">Buscar</label>
            <input type="text" name="buscar" class="form-control form-control-sm rounded-3" placeholder="Buscar..." value="{{ request('buscar') }}">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-bold small mb-1">Estado</label>
            <select name="estado" class="form-select form-select-sm rounded-3">
                <option value="">Todos</option>
                <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ request('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        {{-- Filtro de Banner: SOLO visible en Noticias --}}
        @if(request()->routeIs('admin.noticias.*'))
        <div class="col-md-1">
            <label class="form-label fw-bold small mb-1">Banner</label>
            <select name="banner" class="form-select form-select-sm rounded-3">
                <option value="">Todas</option>
                <option value="destacadas" {{ request('banner') == 'destacadas' ? 'selected' : '' }}>Destacadas</option>
                <option value="no_destacadas" {{ request('banner') == 'no_destacadas' ? 'selected' : '' }}>No destacadas</option>
            </select>
        </div>
        @endif
        <div class="col-md-2">
            <label class="form-label fw-bold small mb-1">Desde</label>
            <input type="date" name="desde" class="form-control form-control-sm rounded-3" value="{{ request('desde') }}">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-bold small mb-1">Hasta</label>
            <input type="date" name="hasta" class="form-control form-control-sm rounded-3" value="{{ request('hasta') }}">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-bold small mb-1">Ordenar por</label>
            <select name="orden" class="form-select form-select-sm rounded-3">
                <option value="reciente" {{ request('orden') == 'reciente' ? 'selected' : '' }}>Más reciente</option>
                <option value="antiguo" {{ request('orden') == 'antiguo' ? 'selected' : '' }}>Más antiguo</option>
                <option value="az" {{ request('orden') == 'az' ? 'selected' : '' }}>A - Z</option>
                <option value="za" {{ request('orden') == 'za' ? 'selected' : '' }}>Z - A</option>
            </select>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-sm btn-primary rounded-pill w-100">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
        </div>
        @if(request()->anyFilled(['buscar', 'estado', 'banner', 'desde', 'hasta', 'orden']))
        <div class="col-md-12 mt-2">
            <a href="{{ url()->current() }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                Limpiar filtros
            </a>
        </div>
        @endif
    </form>
</div>