@extends('layouts.admin')

@section('titulo', 'Crear Usuario')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Crear Nuevo Usuario</h2>

    @if($errors->any())
    <div class="alert alert-danger rounded-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.usuarios.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nombre *</label>
                    <input type="text" name="nombre" class="form-control rounded-3" value="{{ old('nombre') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Apellido *</label>
                    <input type="text" name="apellido" class="form-control rounded-3" value="{{ old('apellido') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cédula *</label>
                    <input type="text" name="cedula" class="form-control rounded-3" value="{{ old('cedula') }}" required maxlength="20">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cargo</label>
                    <input type="text" name="cargo" class="form-control rounded-3" value="{{ old('cargo') }}" placeholder="Ej: Analista de Contenido">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Correo (Usuario) *</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Rol *</label>
                    <select name="rol_id" class="form-select rounded-3" required>
                        <option value="">Seleccione un rol...</option>
                        @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Contraseña *</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control rounded-3" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')" tabindex="-1">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </button>
                    </div>
                    <div id="passwordStrength" class="mt-2" style="font-size: 0.85rem; font-weight: 600;"></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Confirmar Contraseña *</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation')" tabindex="-1">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </button>
                    </div>
                    <div id="passwordMatch" class="mt-2" style="font-size: 0.85rem;"></div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Guardar Usuario</button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

// Verificador de fortaleza de contraseña
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthDiv = document.getElementById('passwordStrength');
    
    if (password.length === 0) {
        strengthDiv.textContent = '';
        return;
    }
    
    let score = 0;
    if (password.length >= 8) score++;
    if (password.length >= 12) score++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
    if (/\d/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;
    
    let mensaje = '';
    let color = '';
    
    if (score <= 2) {
        mensaje = '🔴 Contraseña débil';
        color = '#ef172f';
    } else if (score <= 4) {
        mensaje = '🟡 Contraseña buena';
        color = '#d97706';
    } else {
        mensaje = '🟢 Contraseña excelente';
        color = '#059669';
    }
    
    strengthDiv.textContent = mensaje;
    strengthDiv.style.color = color;
});

// Verificador de coincidencia
document.getElementById('password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmacion = this.value;
    const matchDiv = document.getElementById('passwordMatch');
    
    if (confirmacion.length === 0) {
        matchDiv.textContent = '';
        return;
    }
    
    if (password === confirmacion) {
        matchDiv.textContent = '✅ Las contraseñas coinciden';
        matchDiv.style.color = '#059669';
    } else {
        matchDiv.textContent = '❌ Las contraseñas NO coinciden';
        matchDiv.style.color = '#ef172f';
    }
});
</script>
@endsection