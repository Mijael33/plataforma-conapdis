@extends('layouts.admin')
@section('titulo', 'Editar Persona')
@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Persona</h2>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.organigrama.personas.update', $persona) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label fw-bold">Departamento *</label><select name="departamento_id" class="form-select rounded-3" required>@foreach($departamentos as $d)<option value="{{ $d->id }}" {{ $persona->departamento_id == $d->id ? 'selected' : '' }}>{{ $d->nombre }}</option>@endforeach</select></div>
                <div class="col-md-3"><label class="form-label fw-bold">Nombre *</label><input type="text" name="nombre" class="form-control rounded-3" value="{{ $persona->nombre }}" required></div>
                <div class="col-md-3"><label class="form-label fw-bold">Apellido *</label><input type="text" name="apellido" class="form-control rounded-3" value="{{ $persona->apellido }}" required></div>
                <div class="col-md-6"><label class="form-label fw-bold">Cargo *</label><input type="text" name="cargo" class="form-control rounded-3" value="{{ $persona->cargo }}" required></div>
                <div class="col-md-3"><label class="form-label fw-bold">Orden</label><input type="number" name="orden" class="form-control rounded-3" value="{{ $persona->orden }}"></div>
                <div class="col-md-3"><label class="form-label fw-bold">Foto</label>@if($persona->imagen)<div class="mb-2"><img src="{{ asset('storage/'.$persona->imagen) }}" style="width:60px;height:60px;border-radius:50%;object-fit:cover;"></div>@endif<input type="file" name="imagen" class="form-control rounded-3"></div>
                <div class="col-12"><label class="form-label fw-bold">Descripción</label><textarea name="descripcion" class="form-control rounded-3" rows="2">{{ $persona->descripcion }}</textarea></div>
                <div class="col-12"><div class="form-check"><input type="checkbox" name="activo" value="1" class="form-check-input" {{ $persona->activo ? 'checked' : '' }}><label class="form-check-label fw-bold">Activo</label></div></div>
                <div class="col-12"><button type="submit" class="btn btn-primary rounded-pill px-4">Actualizar</button><a href="{{ route('admin.organigrama.personas.index') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">Cancelar</a></div>
            </div>
        </form>
    </div>
</div>
@endsection