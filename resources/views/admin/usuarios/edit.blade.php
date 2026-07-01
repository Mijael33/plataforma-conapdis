@extends('layouts.admin')

@section('titulo', 'Editar Usuario')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Usuario</h2>

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
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombre *</label>
                    <input type="text" name="name" class="form-control rounded-3" value="{{ old('name', $usuario->name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Email *</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email', $usuario->email) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nueva Contraseña (dejar vacío para no cambiar)</label>
                    <input type="password" name="password" class="form-control rounded-3">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Rol *</label>
                    <select name="rol" class="form-select rounded-3" required>
                        <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="editor" {{ old('rol', $usuario->rol) == 'editor' ? 'selected' : '' }}>Editor</option>
                    </select>
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