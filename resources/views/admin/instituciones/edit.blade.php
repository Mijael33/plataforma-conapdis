@extends('layouts.admin')

@section('titulo', 'Editar Institución Aliada')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Institución Aliada</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.instituciones.update', $institucione) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Nombre de la Institución</label>
                    <input type="text" name="nombre" class="form-control rounded-3" value="{{ $institucione->nombre }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ $institucione->orden }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Logo o Imagen</label>
                    @if($institucione->imagen)
                    <div class="mb-2"><img src="{{ asset('storage/'.$institucione->imagen) }}" style="max-width:100px;border-radius:8px;"></div>
                    @endif
                    <input type="file" name="imagen" class="form-control rounded-3">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Enlace (opcional)</label>
                    <input type="url" name="vinculo" class="form-control rounded-3" value="{{ $institucione->vinculo }}">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $institucione->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.instituciones.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection