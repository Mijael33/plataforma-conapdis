@extends('layouts.admin')

@section('titulo', 'Marco Jurídico')

@section('contenido')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #1a3b5d; font-weight: 700;">Marco Jurídico</h2>
        <a href="{{ route('admin.marco-juridico.create') }}" class="btn btn-warning rounded-pill">+ Nuevo Documento</a>
    </div>

    @include('partials.admin.filtros')

    @if(session('success'))
    <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f8fafc;">
                        <tr>
                            <th class="ps-4">Imagen</th>
                            <th>Título</th>
                            <th>PDF</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leyes as $ley)
                        <tr>
                            <td class="ps-4">
                                @if($ley->imagen)
                                <img src="{{ asset('storage/'.$ley->imagen) }}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;">
                                @else
                                <div style="width:40px;height:40px;border-radius:8px;background:#003097;color:#ffda00;display:flex;align-items:center;justify-content:center;font-weight:700;">📜</div>
                                @endif
                            </td>
                            <td>{{ $ley->titulo }}</td>
                            <td>
                                @if($ley->documento)
                                <a href="{{ asset('storage/'.$ley->documento) }}" target="_blank" class="badge bg-info">Ver PDF</a>
                                @else
                                <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $ley->orden }}</td>
                            <td>
                                @if($ley->activo)
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.marco-juridico.edit', $ley) }}" class="btn btn-sm btn-outline-warning rounded-pill">Editar</a>
                                <form action="{{ route('admin.marco-juridico.destroy', $ley) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay documentos registrados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $leyes->links() }}</div>
</div>
@endsection