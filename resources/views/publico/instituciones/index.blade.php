@extends('layouts.publica')

@section('titulo', 'Instituciones Aliadas')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <h1 class="pagina-titulo mb-4">Instituciones Aliadas</h1>
        <p class="pagina-subtitulo mb-5">Organizaciones e instituciones que trabajan junto a CONAPDIS</p>

        @php $aliadas = App\Models\InstitucionAliada::where('activo', true)->orderBy('orden', 'asc')->get(); @endphp

        @if($aliadas->count() > 0)
        <div class="row g-4">
            @foreach($aliadas as $aliada)
            <div class="col-md-4 col-lg-3">
                @if($aliada->vinculo)
                <a href="{{ $aliada->vinculo }}" target="_blank" class="text-decoration-none">
                @endif
                    <div class="sede-card text-center h-100">
                        @if($aliada->imagen)
                        <img src="{{ asset('storage/'.$aliada->imagen) }}" alt="{{ $aliada->nombre }}" style="max-width: 120px; max-height: 80px; object-fit: contain; margin-bottom: 1rem;">
                        @else
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #003097, #001e5c); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                            <span style="color: #ffda00; font-weight: 700; font-size: 1.5rem;">{{ strtoupper(substr($aliada->nombre, 0, 2)) }}</span>
                        </div>
                        @endif
                        <h4>{{ $aliada->nombre }}</h4>
                    </div>
                @if($aliada->vinculo)
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted fs-5">No hay instituciones aliadas registradas.</p>
        </div>
        @endif
    </div>
</section>

@endsection