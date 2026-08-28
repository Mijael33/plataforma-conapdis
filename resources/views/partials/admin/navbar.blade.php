<nav class="admin-navbar">
    <div class="d-flex justify-content-between align-items-center w-100">
        {{-- Espacio para logo o título en el futuro --}}
        <div></div>
        
        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 text-muted">
                {{ auth()->user()->nombre_completo }} 
                @if(auth()->user()->rol)
                    @if(auth()->user()->rol->es_admin)
                    <span class="badge bg-danger">{{ auth()->user()->rol->nombre }}</span>
                    @else
                    <span class="badge bg-primary">{{ auth()->user()->rol->nombre }}</span>
                    @endif
                @else
                    <span class="badge bg-secondary">Sin rol</span>
                @endif
            </span>
            
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>