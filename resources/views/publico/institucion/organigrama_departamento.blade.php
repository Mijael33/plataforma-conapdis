@extends('layouts.publica')
@section('titulo', 'Equipo')
@section('contenido')
<section class="pagina-institucional py-5">
    <div class="container">
        <a href="{{ route('publico.institucion.organigrama') }}" class="btn-conapdis btn-outline-azul mb-4">← Volver al Organigrama</a>
        
        <h1 class="pagina-titulo mb-2">{{ $departamento->nombre }}</h1>
        @if($departamento->descripcion)
        <p class="pagina-subtitulo mb-5">{{ $departamento->descripcion }}</p>
        @endif
        
        @php 
            $personas = $departamento->personas()->where('activo', true)->get();
            $niveles = $personas->groupBy('orden')->sortKeys();
        @endphp
        
        @if($personas->count() > 0)
        <div class="organigrama-piramide">
            @foreach($niveles as $orden => $grupo)
            <div class="org-nivel">
                @foreach($grupo as $persona)
                <div class="org-persona-card-piramide">
                    @if($persona->imagen)
                    <img src="{{ asset('storage/'.$persona->imagen) }}" alt="{{ $persona->nombre }}" class="org-p-foto-grande">
                    @else
                    <div class="org-p-foto-placeholder-grande">{{ strtoupper(substr($persona->nombre,0,1)) }}</div>
                    @endif
                    <h4>{{ $persona->nombre }} {{ $persona->apellido }}</h4>
                    <span class="org-p-cargo">{{ $persona->cargo }}</span>
                    @if($persona->descripcion)
                    <p class="org-p-desc">{{ $persona->descripcion }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted fs-5">No hay personas asignadas a este departamento.</p>
        </div>
        @endif
    </div>
</section>
@endsection