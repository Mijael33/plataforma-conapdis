@extends('layouts.admin')

@section('titulo', 'Editar Usuario')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Usuario: {{ $usuario->nombre_completo }}</h2>

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
        <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nombre *</label>
                    <input type="text" name="nombre" class="form-control rounded-3" value="{{ old('nombre', $usuario->nombre) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Apellido *</label>
                    <input type="text" name="apellido" class="form-control rounded-3" value="{{ old('apellido', $usuario->apellido) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cédula *</label>
                    <input type="text" name="cedula" class="form-control rounded-3" value="{{ old('cedula', $usuario->cedula) }}" required maxlength="20">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cargo</label>
                    <input type="text" name="cargo" class="form-control rounded-3" value="{{ old('cargo', $usuario->cargo) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Correo (Usuario) *</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email', $usuario->email) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Rol *</label>
                    <select name="rol_id" class="form-select rounded-3" required>
                        <option value="">Seleccione un rol...</option>
                        @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nueva Contraseña (dejar vacío para no cambiar)</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control rounded-3">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')" tabindex="-1">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Confirmar Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation')" tabindex="-1">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" id="activo" value="1" class="form-check-input" {{ old('activo', $usuario->activo) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="activo">Usuario Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Actualizar Usuario</button>
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
</script>
@endsection