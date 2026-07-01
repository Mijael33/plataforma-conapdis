@extends('layouts.admin')

@section('titulo', 'Editar Documento - Marco Jurídico')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Documento Jurídico</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.marco-juridico.update', $marcoJuridico) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Título</label>
                    <input type="text" name="titulo" class="form-control rounded-3" value="{{ old('titulo', $marcoJuridico->titulo) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ old('orden', $marcoJuridico->orden) }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control rounded-3" rows="3">{{ old('descripcion', $marcoJuridico->descripcion) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Imagen</label>
                    @if($marcoJuridico->imagen)
                    <div class="mb-2"><img src="{{ asset('storage/'.$marcoJuridico->imagen) }}" style="max-width:100px;border-radius:8px;"></div>
                    @endif
                    <input type="file" name="imagen" class="form-control rounded-3">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Documento PDF</label>
                    @if($marcoJuridico->documento)
                    <div class="mb-2"><a href="{{ asset('storage/'.$marcoJuridico->documento) }}" target="_blank" class="badge bg-info">Ver PDF actual</a></div>
                    @endif
                    <input type="file" name="documento" class="form-control rounded-3" accept=".pdf">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $marcoJuridico->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.marco-juridico.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection