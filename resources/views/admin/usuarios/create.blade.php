@extends('layouts.admin')

@section('titulo', 'Crear Usuario')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Crear Nuevo Usuario</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.usuarios.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombre</label>
                    <input type="text" name="name" class="form-control rounded-3" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Contraseña</label>
                    <input type="password" name="password" class="form-control rounded-3" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Rol</label>
                    <select name="rol" class="form-select rounded-3" required>
                        <option value="admin">Administrador</option>
                        <option value="editor">Editor</option>
                    </select>
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