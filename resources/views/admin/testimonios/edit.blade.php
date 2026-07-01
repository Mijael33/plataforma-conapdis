@extends('layouts.admin')

@section('titulo', 'Editar Testimonio')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Testimonio</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.testimonios.update', $testimonio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombre del Autor</label>
                    <input type="text" name="nombre_autor" class="form-control rounded-3" value="{{ old('nombre_autor', $testimonio->nombre_autor) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Cargo</label>
                    <input type="text" name="cargo_autor" class="form-control rounded-3" value="{{ old('cargo_autor', $testimonio->cargo_autor) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Testimonio</label>
                    <textarea name="testimonio" class="form-control rounded-3" rows="5" required>{{ old('testimonio', $testimonio->testimonio) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Foto del Autor</label>
                    @if($testimonio->foto_autor)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $testimonio->foto_autor) }}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                    </div>
                    @endif
                    <input type="file" name="foto_autor" class="form-control rounded-3">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="publicado" value="1" class="form-check-input" {{ $testimonio->publicado ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Publicado</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar Testimonio</button>
                    <a href="{{ route('admin.testimonios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection