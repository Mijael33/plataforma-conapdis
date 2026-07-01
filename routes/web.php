<?php

use App\Http\Controllers\Publico\HomeController;
use App\Http\Controllers\Publico\NoticiaController as PublicoNoticiaController;
use App\Http\Controllers\Publico\InstitucionController;
use App\Http\Controllers\Publico\CursoController as PublicoCursoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\CursoController as AdminCursoController;
use App\Http\Controllers\Admin\TestimonioController as AdminTestimonioController;
use App\Http\Controllers\Admin\UsuarioController as AdminUsuarioController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\OrganigramaDepartamentoController as AdminOrganigramaDepartamentoController;
use App\Http\Controllers\Admin\OrganigramaPersonaController as AdminOrganigramaPersonaController;
use App\Http\Controllers\Admin\RedSocialController;
use App\Http\Controllers\Admin\EnlaceMenuController;
use App\Http\Controllers\Admin\InstitucionAliadaController;
use App\Http\Controllers\Admin\LineaTiempoController;
use App\Http\Controllers\Admin\CoordinacionEstadalController;
use App\Http\Controllers\Admin\PuntoCertificacionController;
use App\Http\Controllers\Admin\MarcoJuridicoController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('publico.home');
Route::get('/noticias', [PublicoNoticiaController::class, 'index'])->name('publico.noticias');
Route::get('/noticias/{slug}', [PublicoNoticiaController::class, 'show'])->name('publico.noticia.show');

// Noticias por tipo
Route::get('/conapdis-informa', [PublicoNoticiaController::class, 'informa'])->name('publico.noticias.informa');
Route::get('/conapdis-informa-lsv', [PublicoNoticiaController::class, 'informaLsv'])->name('publico.noticias.informa-lsv');
Route::get('/conapdito-y-conapdita', [PublicoNoticiaController::class, 'conapdito'])->name('publico.noticias.conapdito');

Route::prefix('/institucion')->name('publico.institucion.')->group(function () {
    Route::get('/mision', [InstitucionController::class, 'mision'])->name('mision');
    Route::get('/vision', [InstitucionController::class, 'vision'])->name('vision');
    Route::get('/resena-historica', [InstitucionController::class, 'resena'])->name('resena');
    Route::get('/principios-y-valores', [InstitucionController::class, 'principios'])->name('principios');
    Route::get('/marco-juridico', [InstitucionController::class, 'marcoJuridico'])->name('marco-juridico');
    Route::get('/agenda', [InstitucionController::class, 'agenda'])->name('agenda');
    Route::get('/agenda/{slug}', [InstitucionController::class, 'agendaShow'])->name('agenda.show');
    
    Route::get('/organigrama', function () {
        return view('publico.institucion.organigrama');
    })->name('organigrama');
    
    Route::get('/organigrama/departamento/{id}', function ($id) {
        $departamento = App\Models\OrganigramaDepartamento::findOrFail($id);
        return view('publico.institucion.organigrama_departamento', compact('departamento'));
    })->name('organigrama.departamento');
});

Route::get('/cursos', [PublicoCursoController::class, 'index'])->name('publico.cursos');
Route::get('/cursos/{slug}', [PublicoCursoController::class, 'show'])->name('publico.cursos.show');

// Servicios
Route::prefix('/servicios')->name('publico.servicios.')->group(function () {
    Route::get('/', function () {
        return view('publico.servicios.index');
    })->name('index');
    Route::get('/registro-certificacion', function () {
        $puntosCertificacion = App\Models\PuntoCertificacion::where('activo', true)->orderBy('orden', 'asc')->orderBy('fecha', 'desc')->get();
        return view('publico.servicios.registro', compact('puntosCertificacion'));
    })->name('registro');
    Route::view('/fiscalizacion', 'publico.servicios.fiscalizacion')->name('fiscalizacion');
    Route::view('/gestion-social', 'publico.servicios.gestion-social')->name('gestion-social');
    Route::view('/atencion-ciudadano', 'publico.servicios.atencion-ciudadano')->name('atencion-ciudadano');
    Route::view('/gestion-estadal', 'publico.servicios.gestion-estadal')->name('gestion-estadal');
});

// Discapacidades
Route::prefix('/discapacidad')->name('publico.discapacidad.')->group(function () {
    Route::view('/intelectual', 'publico.discapacidad.intelectual')->name('intelectual');
    Route::view('/auditiva', 'publico.discapacidad.auditiva')->name('auditiva');
    Route::view('/multiple', 'publico.discapacidad.multiple')->name('multiple');
    Route::view('/motora', 'publico.discapacidad.motora')->name('motora');
    Route::view('/visual', 'publico.discapacidad.visual')->name('visual');
});

// Redes Sociales (dinámicas)
Route::get('/redes/{red}', function ($red) {
    $cuentas = App\Models\RedSocial::where('red', $red)->where('activo', true)->orderBy('destacado', 'desc')->orderBy('orden', 'asc')->get();
    $redes = ['instagram' => 'Instagram', 'facebook' => 'Facebook', 'tiktok' => 'TikTok', 'youtube' => 'YouTube', 'telegram' => 'Telegram'];
    if (!isset($redes[$red])) abort(404);
    return view('publico.redes.show', compact('cuentas', 'red', 'redes'));
})->name('publico.redes.show');

// Instituciones Aliadas
Route::view('/instituciones-aliadas', 'publico.instituciones.index')->name('publico.instituciones');

// Contáctanos
Route::view('/contactanos', 'publico.contactanos')->name('publico.contactanos');

// Páginas legales
Route::view('/privacidad', 'publico.privacidad')->name('publico.privacidad');
Route::view('/terminos', 'publico.terminos')->name('publico.terminos');

// Sedes (dinámica con coordinaciones)
Route::get('/sedes', function () {
    $coordinaciones = App\Models\CoordinacionEstadal::where('activo', true)->orderBy('orden', 'asc')->get();
    return view('publico.sedes.index', compact('coordinaciones'));
})->name('publico.sedes');

/*
|--------------------------------------------------------------------------
| PANEL ADMINISTRATIVO
|--------------------------------------------------------------------------
*/

Route::get('/panel-conapdis-admin', [AuthenticatedSessionController::class, 'create'])->name('login');

// ÚNICO CAMBIO DE SEGURIDAD: 5 intentos de login por minuto
Route::post('/panel-conapdis-admin', [AuthenticatedSessionController::class, 'store'])
    ->middleware('throttle:5,1');

// Panel accesible para admin Y editor
Route::prefix('panel-conapdis-admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Mantenimiento y respaldo (SOLO admin)
    Route::middleware(['solo.admin'])->group(function () {
        Route::get('/limpiar', [DashboardController::class, 'limpiar'])->name('limpiar');
        Route::get('/exportar', [DashboardController::class, 'exportar'])->name('exportar');
        Route::post('/importar', [DashboardController::class, 'importar'])->name('importar');
    });
    
    Route::resource('noticias', AdminNoticiaController::class);
    Route::resource('cursos', AdminCursoController::class);
    Route::resource('testimonios', AdminTestimonioController::class);
    Route::resource('agenda', AdminAgendaController::class);
    Route::resource('redes', RedSocialController::class);
    Route::resource('enlaces', EnlaceMenuController::class);
    Route::resource('instituciones', InstitucionAliadaController::class);
    Route::resource('linea-tiempo', LineaTiempoController::class);
    Route::resource('coordinaciones', CoordinacionEstadalController::class);
    Route::resource('puntos-certificacion', PuntoCertificacionController::class);
    Route::resource('marco-juridico', MarcoJuridicoController::class);

    Route::resource('organigrama/departamentos', AdminOrganigramaDepartamentoController::class)
        ->names([
            'index' => 'organigrama.departamentos.index',
            'create' => 'organigrama.departamentos.create',
            'store' => 'organigrama.departamentos.store',
            'show' => 'organigrama.departamentos.show',
            'edit' => 'organigrama.departamentos.edit',
            'update' => 'organigrama.departamentos.update',
            'destroy' => 'organigrama.departamentos.destroy',
        ]);

    Route::resource('organigrama/personas', AdminOrganigramaPersonaController::class)
        ->names([
            'index' => 'organigrama.personas.index',
            'create' => 'organigrama.personas.create',
            'store' => 'organigrama.personas.store',
            'show' => 'organigrama.personas.show',
            'edit' => 'organigrama.personas.edit',
            'update' => 'organigrama.personas.update',
            'destroy' => 'organigrama.personas.destroy',
        ]);

    // Usuarios (SOLO admin)
    Route::resource('usuarios', AdminUsuarioController::class)->middleware('solo.admin');
});