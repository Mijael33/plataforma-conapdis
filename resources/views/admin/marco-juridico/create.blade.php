@extends('layouts.admin')

@section('titulo', 'Nuevo Documento - Marco Jurídico')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Nuevo Documento Jurídico</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.marco-juridico.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Título</label>
                    <input type="text" name="titulo" class="form-control rounded-3" value="{{ old('titulo') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ old('orden', 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control rounded-3" rows="3">{{ old('descripcion') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Imagen</label>
                    <input type="file" name="imagen" class="form-control rounded-3">
                    <small class="text-muted">Formatos: JPG, PNG, WebP. Máximo 2MB</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Documento PDF</label>
                    <input type="file" name="documento" class="form-control rounded-3" accept=".pdf">
                    <small class="text-muted">Solo PDF. Máximo 50MB</small>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" checked>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Guardar</button>
                    <a href="{{ route('admin.marco-juridico.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection