@extends('layouts.admin')

@section('titulo', 'Nueva Institución Aliada')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Nueva Institución Aliada</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.instituciones.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Nombre de la Institución</label>
                    <input type="text" name="nombre" class="form-control rounded-3" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="0">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Logo o Imagen</label>
                    <input type="file" name="imagen" class="form-control rounded-3">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Enlace (opcional)</label>
                    <input type="url" name="vinculo" class="form-control rounded-3" placeholder="https://...">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" checked>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Guardar</button>
                    <a href="{{ route('admin.instituciones.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection