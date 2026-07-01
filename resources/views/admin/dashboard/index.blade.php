@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<div class="container-fluid">
    <h2 class="mb-4" style="color: #1a3b5d; font-weight: 700;">Panel de Control</h2>
    
    {{-- Estadísticas --}}
    <div class="row g-3 mb-4">
        @php
        $stats = [
            ['label' => 'Noticias', 'total' => $totalNoticias, 'color' => '#2563eb', 'bg' => '#dbeafe', 'icon' => '<path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1"></path><line x1="16" y1="2" x2="16" y2="8"></line><line x1="8" y1="13" x2="16" y2="13"></line>'],
            ['label' => 'Formaciones', 'total' => $totalCursos, 'color' => '#059669', 'bg' => '#d1fae5', 'icon' => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path><line x1="8" y1="7" x2="16" y2="7"></line>'],
            ['label' => 'Testimonios', 'total' => $totalTestimonios, 'color' => '#d97706', 'bg' => '#fef3c7', 'icon' => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>'],
            ['label' => 'Agenda', 'total' => $totalAgenda, 'color' => '#db2777', 'bg' => '#fce7f3', 'icon' => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>'],
            ['label' => 'M. Jurídico', 'total' => $totalMarcoJuridico, 'color' => '#7c3aed', 'bg' => '#ede9fe', 'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline>'],
            ['label' => 'L. Tiempo', 'total' => $totalLineaTiempo, 'color' => '#0891b2', 'bg' => '#cffafe', 'icon' => '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>'],
            ['label' => 'Usuarios', 'total' => $totalUsuarios, 'color' => '#4f46e5', 'bg' => '#e0e7ff', 'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle>'],
            ['label' => 'Redes', 'total' => $totalRedes, 'color' => '#e11d48', 'bg' => '#ffe4e6', 'icon' => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>'],
            ['label' => 'Enlaces', 'total' => $totalEnlaces, 'color' => '#ca8a04', 'bg' => '#fef9c3', 'icon' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>'],
            ['label' => 'Instituciones', 'total' => $totalInstituciones, 'color' => '#16a34a', 'bg' => '#dcfce7', 'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle>'],
            ['label' => 'Coordinaciones', 'total' => $totalCoordinaciones, 'color' => '#9333ea', 'bg' => '#f3e8ff', 'icon' => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>'],
            ['label' => 'Organigrama', 'total' => $totalDepartamentos + $totalPersonas, 'color' => '#0d9488', 'bg' => '#ccfbf1', 'icon' => '<rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>'],
        ];
        usort($stats, function($a, $b) { return $b['total'] - $a['total']; });
        @endphp

        @foreach($stats as $stat)
        <div class="col-xl-2 col-md-4 col-6">
            <div class="card border-0 shadow-sm rounded-4 p-3" style="border-left: 4px solid {{ $stat['color'] }};">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: {{ $stat['bg'] }};">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="{{ $stat['color'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $stat['icon'] !!}</svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: #1f2937; margin: 0; font-size: 1.2rem;">{{ $stat['total'] }}</h4>
                        <small style="color: #6b7280; font-size: 0.7rem;">{{ $stat['label'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Gráficos --}}
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 style="color: #1a3b5d; font-weight: 700;">Resumen General</h5>
                <canvas id="graficoBarras" height="300"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 style="color: #1a3b5d; font-weight: 700;">Distribución</h5>
                <canvas id="graficoPastel" height="300"></canvas>
            </div>
        </div>
    </div>

    {{-- Mantenimiento y Respaldo (SOLO admin) --}}
    @if(auth()->user()->isAdmin())
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 style="color: #1a3b5d; font-weight: 700;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1a3b5d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -5px; margin-right: 0.5rem;">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                    Mantenimiento y Respaldo
                </h5>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">Herramientas para limpiar, respaldar y restaurar completamente la base de datos y archivos.</p>

                {{-- Mensajes de estado --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row g-4">
                    {{-- Botón Limpiar --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-danger border-2 rounded-4 h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"></path>
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                        <path d="M10 11v6"></path>
                                        <path d="M14 11v6"></path>
                                    </svg>
                                </div>
                                <h5 style="color: #ef172f; font-weight: 700;">Limpiar Base de Datos</h5>
                                <p class="text-muted" style="font-size: 0.85rem;">Vacía <strong>todas</strong> las tablas de contenido, borra <strong>todas</strong> las imágenes y limpia la caché. Los usuarios se conservan.</p>
                                <button type="button" class="btn btn-danger w-100" onclick="confirmarLimpiar()">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                    </svg>
                                    Limpiar Todo
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Botón Exportar --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-success border-2 rounded-4 h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </div>
                                <h5 style="color: #059669; font-weight: 700;">Exportar Respaldo</h5>
                                <p class="text-muted" style="font-size: 0.85rem;">Descarga un archivo <strong>ZIP</strong> con <strong>toda</strong> la base de datos (JSON) + <strong>todas</strong> las imágenes.</p>
                                <a href="{{ route('admin.exportar') }}" class="btn btn-success w-100">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                    Descargar Respaldo
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Botón Importar --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-warning border-2 rounded-4 h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                </div>
                                <h5 style="color: #d97706; font-weight: 700;">Importar Respaldo</h5>
                                <p class="text-muted" style="font-size: 0.85rem;">Restaura <strong>todo</strong> desde un archivo <strong>ZIP</strong> o <strong>JSON</strong>. Datos + imágenes (si es ZIP).</p>
                                <form action="{{ route('admin.importar') }}" method="POST" enctype="multipart/form-data" id="formImportar">
                                    @csrf
                                    <input type="file" name="archivo_respaldo" id="archivo_respaldo" accept=".json,.zip" style="display: none;" onchange="document.getElementById('formImportar').submit()">
                                    <button type="button" class="btn btn-warning w-100" onclick="document.getElementById('archivo_respaldo').click()">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" y1="3" x2="12" y2="15"></line>
                                        </svg>
                                        Seleccionar Archivo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Modal de confirmación para limpiar --}}
    <div class="modal fade" id="modalLimpiar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -5px; margin-right: 0.4rem;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        Confirmar Limpieza
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>¿Estás completamente seguro?</strong></p>
                    <p>Esta acción:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                            </svg>
                            Eliminará <strong>TODOS</strong> los registros de contenido
                        </li>
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            Borrará <strong>TODAS</strong> las imágenes subidas
                        </li>
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                            Limpiará toda la caché del sistema
                        </li>
                        <li class="mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <strong>Los usuarios se conservan</strong>
                        </li>
                        <li class="mb-0">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef172f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.5rem;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <strong>NO se puede deshacer</strong>
                        </li>
                    </ul>
                    <p class="text-danger mt-3 mb-0">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -4px; margin-right: 0.3rem;">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        <strong>Recomendación:</strong> Exporta un respaldo completo antes de limpiar.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('admin.limpiar') }}" class="btn btn-danger">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -3px; margin-right: 0.3rem;">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                        </svg>
                        Sí, Limpiar Todo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function confirmarLimpiar() {
        var modal = new bootstrap.Modal(document.getElementById('modalLimpiar'));
        modal.show();
    }
    </script>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
const statsData = [
    { label: 'Noticias', value: {{ $totalNoticias }}, color: '#2563eb' },
    { label: 'Formaciones', value: {{ $totalCursos }}, color: '#059669' },
    { label: 'Testimonios', value: {{ $totalTestimonios }}, color: '#d97706' },
    { label: 'Agenda', value: {{ $totalAgenda }}, color: '#db2777' },
    { label: 'M. Jurídico', value: {{ $totalMarcoJuridico }}, color: '#7c3aed' },
    { label: 'L. Tiempo', value: {{ $totalLineaTiempo }}, color: '#0891b2' },
    { label: 'Usuarios', value: {{ $totalUsuarios }}, color: '#4f46e5' },
    { label: 'Redes', value: {{ $totalRedes }}, color: '#e11d48' },
    { label: 'Enlaces', value: {{ $totalEnlaces }}, color: '#ca8a04' },
    { label: 'Instituciones', value: {{ $totalInstituciones }}, color: '#16a34a' },
    { label: 'Coordinaciones', value: {{ $totalCoordinaciones }}, color: '#9333ea' },
    { label: 'Organigrama', value: {{ $totalDepartamentos + $totalPersonas }}, color: '#0d9488' }
].sort((a, b) => b.value - a.value);

const ctxBar = document.getElementById('graficoBarras').getContext('2d');
new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: statsData.map(s => s.label),
        datasets: [{
            label: 'Total',
            data: statsData.map(s => s.value),
            backgroundColor: statsData.map(s => s.color),
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

const ctxPie = document.getElementById('graficoPastel').getContext('2d');
new Chart(ctxPie, {
    type: 'doughnut',
    data: {
        labels: statsData.map(s => s.label),
        datasets: [{
            data: statsData.map(s => s.value),
            backgroundColor: statsData.map(s => s.color)
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom', labels: { padding: 10, font: { size: 10 } } }
        }
    }
});
</script>
@endsection