@extends('layouts.admin')
@section('titulo', 'Editar Departamento')
@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Departamento</h2>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.organigrama.departamentos.update', $departamento) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8"><label class="form-label fw-bold">Nombre *</label><input type="text" name="nombre" class="form-control rounded-3" value="{{ $departamento->nombre }}" required></div>
                <div class="col-md-4"><label class="form-label fw-bold">Color</label><input type="color" name="color" class="form-control form-control-color" value="{{ $departamento->color }}"></div>
                <div class="col-md-4"><label class="form-label fw-bold">Orden</label><input type="number" name="orden" class="form-control rounded-3" value="{{ $departamento->orden }}"></div>
                <div class="col-md-4"><label class="form-label fw-bold">Imagen</label>@if($departamento->imagen)<div class="mb-2"><img src="{{ asset('storage/'.$departamento->imagen) }}" style="max-width:100px;border-radius:8px;"></div>@endif<input type="file" name="imagen" class="form-control rounded-3"></div>
                <div class="col-12"><label class="form-label fw-bold">Descripción</label><textarea name="descripcion" class="form-control rounded-3" rows="2">{{ $departamento->descripcion }}</textarea></div>
                <div class="col-12"><div class="form-check"><input type="checkbox" name="activo" value="1" class="form-check-input" {{ $departamento->activo ? 'checked' : '' }}><label class="form-check-label fw-bold">Activo</label></div></div>
                <div class="col-12"><button type="submit" class="btn btn-primary rounded-pill px-4">Actualizar</button><a href="{{ route('admin.organigrama.departamentos.index') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">Cancelar</a></div>
            </div>
        </form>
    </div>
</div>
@endsection