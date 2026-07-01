@extends('layouts.admin')

@section('titulo', 'Editar Enlace')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Enlace - CONAPDIS en Línea</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.enlaces.update', $enlace) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Título</label>
                    <input type="text" name="titulo" class="form-control rounded-3" value="{{ $enlace->titulo }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ $enlace->orden }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Enlace</label>
                    <input type="url" name="vinculo" class="form-control rounded-3" value="{{ $enlace->vinculo }}" required>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $enlace->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.enlaces.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection