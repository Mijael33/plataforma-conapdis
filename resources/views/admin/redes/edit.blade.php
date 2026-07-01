@extends('layouts.admin')

@section('titulo', 'Editar Cuenta de Red Social')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Cuenta de Red Social</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.redes.update', $rede) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Red Social</label>
                    <select name="red" class="form-select rounded-3" required>
                        <option value="instagram" {{ $rede->red == 'instagram' ? 'selected' : '' }}>Instagram</option>
                        <option value="facebook" {{ $rede->red == 'facebook' ? 'selected' : '' }}>Facebook</option>
                        <option value="tiktok" {{ $rede->red == 'tiktok' ? 'selected' : '' }}>TikTok</option>
                        <option value="youtube" {{ $rede->red == 'youtube' ? 'selected' : '' }}>YouTube</option>
                        <option value="telegram" {{ $rede->red == 'telegram' ? 'selected' : '' }}>Telegram</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Nombre de la Cuenta</label>
                    <input type="text" name="nombre_cuenta" class="form-control rounded-3" value="{{ $rede->nombre_cuenta }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Orden</label>
                    <input type="number" name="orden" class="form-control rounded-3" value="{{ $rede->orden }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Enlace</label>
                    <input type="url" name="vinculo" class="form-control rounded-3" value="{{ $rede->vinculo }}" required>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="destacado" value="1" class="form-check-input" {{ $rede->destacado ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Destacar como principal</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="activo" value="1" class="form-check-input" {{ $rede->activo ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Activo</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Actualizar</button>
                    <a href="{{ route('admin.redes.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection