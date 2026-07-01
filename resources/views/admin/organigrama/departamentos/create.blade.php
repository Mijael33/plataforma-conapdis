@extends('layouts.admin')
@section('titulo', 'Nuevo Departamento')
@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Nuevo Departamento</h2>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.organigrama.departamentos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8"><label class="form-label fw-bold">Nombre *</label><input type="text" name="nombre" class="form-control rounded-3" required></div>
                <div class="col-md-4"><label class="form-label fw-bold">Color</label><input type="color" name="color" class="form-control form-control-color" value="#003097"></div>
                <div class="col-md-4"><label class="form-label fw-bold">Orden</label><input type="number" name="orden" class="form-control rounded-3" value="0"></div>
                <div class="col-md-4"><label class="form-label fw-bold">Imagen</label><input type="file" name="imagen" class="form-control rounded-3"></div>
                <div class="col-12"><label class="form-label fw-bold">Descripción</label><textarea name="descripcion" class="form-control rounded-3" rows="2"></textarea></div>
                <div class="col-12"><div class="form-check"><input type="checkbox" name="activo" value="1" class="form-check-input" checked><label class="form-check-label fw-bold">Activo</label></div></div>
                <div class="col-12"><button type="submit" class="btn btn-primary rounded-pill px-4">Guardar</button><a href="{{ route('admin.organigrama.departamentos.index') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">Cancelar</a></div>
            </div>
        </form>
    </div>
</div>
@endsection