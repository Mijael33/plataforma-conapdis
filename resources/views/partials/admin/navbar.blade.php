<nav class="admin-navbar">
    <div class="d-flex justify-content-between align-items-center w-100">
        {{-- Espacio para logo o título en el futuro --}}
        <div></div>
        
        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 text-muted">
                {{ auth()->user()->name }} 
                <span class="badge bg-primary">{{ auth()->user()->rol }}</span>
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