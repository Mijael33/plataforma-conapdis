@extends('layouts.publica')
@section('titulo', 'Organigrama')
@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-4">Línea de Mando</h1>
        <p class="pagina-subtitulo mb-5">Haga clic en un departamento para ver su equipo</p>
        
        @php 
            $departamentos = App\Models\OrganigramaDepartamento::where('activo', true)->orderBy('orden', 'asc')->get();
            $niveles = $departamentos->groupBy('orden')->sortKeys();
        @endphp
        
        @if($departamentos->count() > 0)
        <div class="organigrama-piramide">
            @foreach($niveles as $orden => $deps)
            <div class="org-nivel">
                @foreach($deps as $dep)
                <a href="{{ route('publico.institucion.organigrama.departamento', $dep->id) }}" class="org-departamento-card text-decoration-none" style="border-top: 5px solid {{ $dep->color }};">
                    @if($dep->imagen)
                    <img src="{{ asset('storage/'.$dep->imagen) }}" alt="{{ $dep->nombre }}" class="org-dep-imagen-central">
                    @endif
                    <h3>{{ $dep->nombre }}</h3>
                    @if($dep->descripcion)
                    <p class="org-dep-desc">{{ $dep->descripcion }}</p>
                    @endif
                    <span class="org-ver-mas">Ver equipo →</span>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-muted">No hay departamentos registrados.</p>
        @endif
    </div>
</section>
@endsection