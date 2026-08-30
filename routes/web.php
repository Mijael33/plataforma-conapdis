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
use App\Http\Controllers\Admin\RolController;
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
use App\Http\Controllers\Admin\ProgramaNoticiaController;
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
Route::get('/noticias/programa/{slug}', [PublicoNoticiaController::class, 'programa'])->name('publico.noticias.programa');

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

Route::prefix('/discapacidad')->name('publico.discapacidad.')->group(function () {
    Route::view('/intelectual', 'publico.discapacidad.intelectual')->name('intelectual');
    Route::view('/auditiva', 'publico.discapacidad.auditiva')->name('auditiva');
    Route::view('/multiple', 'publico.discapacidad.multiple')->name('multiple');
    Route::view('/motora', 'publico.discapacidad.motora')->name('motora');
    Route::view('/visual', 'publico.discapacidad.visual')->name('visual');
});

Route::get('/redes/{red}', function ($red) {
    $cuentas = App\Models\RedSocial::where('red', $red)->where('activo', true)->orderBy('destacado', 'desc')->orderBy('orden', 'asc')->get();
    $redes = ['instagram' => 'Instagram', 'facebook' => 'Facebook', 'tiktok' => 'TikTok', 'youtube' => 'YouTube', 'telegram' => 'Telegram'];
    if (!isset($redes[$red])) abort(404);
    return view('publico.redes.show', compact('cuentas', 'red', 'redes'));
})->name('publico.redes.show');

Route::view('/instituciones-aliadas', 'publico.instituciones.index')->name('publico.instituciones');
Route::view('/contactanos', 'publico.contactanos')->name('publico.contactanos');

// Páginas legales y acerca de
Route::view('/privacidad', 'publico.privacidad')->name('publico.privacidad');
Route::view('/terminos', 'publico.terminos')->name('publico.terminos');
Route::view('/acerca-de', 'publico.acerca-de')->name('publico.acerca-de');

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
Route::post('/panel-conapdis-admin', [AuthenticatedSessionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login');

Route::prefix('panel-conapdis-admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::middleware(['permiso:dashboard,gestionar_mantenimiento'])->group(function () {
        Route::get('/limpiar', [DashboardController::class, 'limpiar'])->name('limpiar');
        Route::get('/exportar', [DashboardController::class, 'exportar'])->name('exportar');
        Route::post('/importar', [DashboardController::class, 'importar'])->name('importar');
    });
    
    // Noticias - permisos
    Route::get('/noticias', [AdminNoticiaController::class, 'index'])->middleware('permiso:noticias,ver')->name('noticias.index');
    Route::get('/noticias/create', [AdminNoticiaController::class, 'create'])->middleware('permiso:noticias,crear')->name('noticias.create');
    Route::post('/noticias', [AdminNoticiaController::class, 'store'])->middleware('permiso:noticias,crear')->name('noticias.store');
    Route::get('/noticias/{noticia}', [AdminNoticiaController::class, 'show'])->middleware('permiso:noticias,ver')->name('noticias.show');
    Route::get('/noticias/{noticia}/edit', [AdminNoticiaController::class, 'edit'])->middleware('permiso:noticias,editar')->name('noticias.edit');
    Route::put('/noticias/{noticia}', [AdminNoticiaController::class, 'update'])->middleware('permiso:noticias,editar')->name('noticias.update');
    Route::delete('/noticias/{noticia}', [AdminNoticiaController::class, 'destroy'])->middleware('permiso:noticias,eliminar')->name('noticias.destroy');

    // Programas de Noticias
    Route::get('/programas-noticias', [ProgramaNoticiaController::class, 'index'])->middleware('permiso:programas_noticias,ver')->name('programas-noticias.index');
    Route::get('/programas-noticias/create', [ProgramaNoticiaController::class, 'create'])->middleware('permiso:programas_noticias,crear')->name('programas-noticias.create');
    Route::post('/programas-noticias', [ProgramaNoticiaController::class, 'store'])->middleware('permiso:programas_noticias,crear')->name('programas-noticias.store');
    Route::get('/programas-noticias/{programas_noticia}/edit', [ProgramaNoticiaController::class, 'edit'])->middleware('permiso:programas_noticias,editar')->name('programas-noticias.edit');
    Route::put('/programas-noticias/{programas_noticia}', [ProgramaNoticiaController::class, 'update'])->middleware('permiso:programas_noticias,editar')->name('programas-noticias.update');
    Route::delete('/programas-noticias/{programas_noticia}', [ProgramaNoticiaController::class, 'destroy'])->middleware('permiso:programas_noticias,eliminar')->name('programas-noticias.destroy');

    // Cursos
    Route::get('/cursos', [AdminCursoController::class, 'index'])->middleware('permiso:cursos,ver')->name('cursos.index');
    Route::get('/cursos/create', [AdminCursoController::class, 'create'])->middleware('permiso:cursos,crear')->name('cursos.create');
    Route::post('/cursos', [AdminCursoController::class, 'store'])->middleware('permiso:cursos,crear')->name('cursos.store');
    Route::get('/cursos/{curso}', [AdminCursoController::class, 'show'])->middleware('permiso:cursos,ver')->name('cursos.show');
    Route::get('/cursos/{curso}/edit', [AdminCursoController::class, 'edit'])->middleware('permiso:cursos,editar')->name('cursos.edit');
    Route::put('/cursos/{curso}', [AdminCursoController::class, 'update'])->middleware('permiso:cursos,editar')->name('cursos.update');
    Route::delete('/cursos/{curso}', [AdminCursoController::class, 'destroy'])->middleware('permiso:cursos,eliminar')->name('cursos.destroy');

    // Testimonios
    Route::get('/testimonios', [AdminTestimonioController::class, 'index'])->middleware('permiso:testimonios,ver')->name('testimonios.index');
    Route::get('/testimonios/create', [AdminTestimonioController::class, 'create'])->middleware('permiso:testimonios,crear')->name('testimonios.create');
    Route::post('/testimonios', [AdminTestimonioController::class, 'store'])->middleware('permiso:testimonios,crear')->name('testimonios.store');
    Route::get('/testimonios/{testimonio}/edit', [AdminTestimonioController::class, 'edit'])->middleware('permiso:testimonios,editar')->name('testimonios.edit');
    Route::put('/testimonios/{testimonio}', [AdminTestimonioController::class, 'update'])->middleware('permiso:testimonios,editar')->name('testimonios.update');
    Route::delete('/testimonios/{testimonio}', [AdminTestimonioController::class, 'destroy'])->middleware('permiso:testimonios,eliminar')->name('testimonios.destroy');

    // Agenda
    Route::get('/agenda', [AdminAgendaController::class, 'index'])->middleware('permiso:agenda,ver')->name('agenda.index');
    Route::get('/agenda/create', [AdminAgendaController::class, 'create'])->middleware('permiso:agenda,crear')->name('agenda.create');
    Route::post('/agenda', [AdminAgendaController::class, 'store'])->middleware('permiso:agenda,crear')->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AdminAgendaController::class, 'edit'])->middleware('permiso:agenda,editar')->name('agenda.edit');
    Route::put('/agenda/{agenda}', [AdminAgendaController::class, 'update'])->middleware('permiso:agenda,editar')->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AdminAgendaController::class, 'destroy'])->middleware('permiso:agenda,eliminar')->name('agenda.destroy');

    // Marco Jurídico
    Route::get('/marco-juridico', [MarcoJuridicoController::class, 'index'])->middleware('permiso:marco_juridico,ver')->name('marco-juridico.index');
    Route::get('/marco-juridico/create', [MarcoJuridicoController::class, 'create'])->middleware('permiso:marco_juridico,crear')->name('marco-juridico.create');
    Route::post('/marco-juridico', [MarcoJuridicoController::class, 'store'])->middleware('permiso:marco_juridico,crear')->name('marco-juridico.store');
    Route::get('/marco-juridico/{marco_juridico}/edit', [MarcoJuridicoController::class, 'edit'])->middleware('permiso:marco_juridico,editar')->name('marco-juridico.edit');
    Route::put('/marco-juridico/{marco_juridico}', [MarcoJuridicoController::class, 'update'])->middleware('permiso:marco_juridico,editar')->name('marco-juridico.update');
    Route::delete('/marco-juridico/{marco_juridico}', [MarcoJuridicoController::class, 'destroy'])->middleware('permiso:marco_juridico,eliminar')->name('marco-juridico.destroy');

    // Línea de Tiempo
    Route::get('/linea-tiempo', [LineaTiempoController::class, 'index'])->middleware('permiso:linea_tiempo,ver')->name('linea-tiempo.index');
    Route::get('/linea-tiempo/create', [LineaTiempoController::class, 'create'])->middleware('permiso:linea_tiempo,crear')->name('linea-tiempo.create');
    Route::post('/linea-tiempo', [LineaTiempoController::class, 'store'])->middleware('permiso:linea_tiempo,crear')->name('linea-tiempo.store');
    Route::get('/linea-tiempo/{linea_tiempo}/edit', [LineaTiempoController::class, 'edit'])->middleware('permiso:linea_tiempo,editar')->name('linea-tiempo.edit');
    Route::put('/linea-tiempo/{linea_tiempo}', [LineaTiempoController::class, 'update'])->middleware('permiso:linea_tiempo,editar')->name('linea-tiempo.update');
    Route::delete('/linea-tiempo/{linea_tiempo}', [LineaTiempoController::class, 'destroy'])->middleware('permiso:linea_tiempo,eliminar')->name('linea-tiempo.destroy');

    // Redes Sociales
    Route::get('/redes', [RedSocialController::class, 'index'])->middleware('permiso:redes,ver')->name('redes.index');
    Route::get('/redes/create', [RedSocialController::class, 'create'])->middleware('permiso:redes,crear')->name('redes.create');
    Route::post('/redes', [RedSocialController::class, 'store'])->middleware('permiso:redes,crear')->name('redes.store');
    Route::get('/redes/{red}/edit', [RedSocialController::class, 'edit'])->middleware('permiso:redes,editar')->name('redes.edit');
    Route::put('/redes/{red}', [RedSocialController::class, 'update'])->middleware('permiso:redes,editar')->name('redes.update');
    Route::delete('/redes/{red}', [RedSocialController::class, 'destroy'])->middleware('permiso:redes,eliminar')->name('redes.destroy');

    // Enlaces
    Route::get('/enlaces', [EnlaceMenuController::class, 'index'])->middleware('permiso:enlaces,ver')->name('enlaces.index');
    Route::get('/enlaces/create', [EnlaceMenuController::class, 'create'])->middleware('permiso:enlaces,crear')->name('enlaces.create');
    Route::post('/enlaces', [EnlaceMenuController::class, 'store'])->middleware('permiso:enlaces,crear')->name('enlaces.store');
    Route::get('/enlaces/{enlace}/edit', [EnlaceMenuController::class, 'edit'])->middleware('permiso:enlaces,editar')->name('enlaces.edit');
    Route::put('/enlaces/{enlace}', [EnlaceMenuController::class, 'update'])->middleware('permiso:enlaces,editar')->name('enlaces.update');
    Route::delete('/enlaces/{enlace}', [EnlaceMenuController::class, 'destroy'])->middleware('permiso:enlaces,eliminar')->name('enlaces.destroy');

    // Instituciones
    Route::get('/instituciones', [InstitucionAliadaController::class, 'index'])->middleware('permiso:instituciones,ver')->name('instituciones.index');
    Route::get('/instituciones/create', [InstitucionAliadaController::class, 'create'])->middleware('permiso:instituciones,crear')->name('instituciones.create');
    Route::post('/instituciones', [InstitucionAliadaController::class, 'store'])->middleware('permiso:instituciones,crear')->name('instituciones.store');
    Route::get('/instituciones/{institucione}/edit', [InstitucionAliadaController::class, 'edit'])->middleware('permiso:instituciones,editar')->name('instituciones.edit');
    Route::put('/instituciones/{institucione}', [InstitucionAliadaController::class, 'update'])->middleware('permiso:instituciones,editar')->name('instituciones.update');
    Route::delete('/instituciones/{institucione}', [InstitucionAliadaController::class, 'destroy'])->middleware('permiso:instituciones,eliminar')->name('instituciones.destroy');

    // Coordinaciones
    Route::get('/coordinaciones', [CoordinacionEstadalController::class, 'index'])->middleware('permiso:coordinaciones,ver')->name('coordinaciones.index');
    Route::get('/coordinaciones/create', [CoordinacionEstadalController::class, 'create'])->middleware('permiso:coordinaciones,crear')->name('coordinaciones.create');
    Route::post('/coordinaciones', [CoordinacionEstadalController::class, 'store'])->middleware('permiso:coordinaciones,crear')->name('coordinaciones.store');
    Route::get('/coordinaciones/{coordinacione}/edit', [CoordinacionEstadalController::class, 'edit'])->middleware('permiso:coordinaciones,editar')->name('coordinaciones.edit');
    Route::put('/coordinaciones/{coordinacione}', [CoordinacionEstadalController::class, 'update'])->middleware('permiso:coordinaciones,editar')->name('coordinaciones.update');
    Route::delete('/coordinaciones/{coordinacione}', [CoordinacionEstadalController::class, 'destroy'])->middleware('permiso:coordinaciones,eliminar')->name('coordinaciones.destroy');

    // Puntos de Certificación
    Route::get('/puntos-certificacion', [PuntoCertificacionController::class, 'index'])->middleware('permiso:puntos_certificacion,ver')->name('puntos-certificacion.index');
    Route::get('/puntos-certificacion/create', [PuntoCertificacionController::class, 'create'])->middleware('permiso:puntos_certificacion,crear')->name('puntos-certificacion.create');
    Route::post('/puntos-certificacion', [PuntoCertificacionController::class, 'store'])->middleware('permiso:puntos_certificacion,crear')->name('puntos-certificacion.store');
    Route::get('/puntos-certificacion/{puntos_certificacion}/edit', [PuntoCertificacionController::class, 'edit'])->middleware('permiso:puntos_certificacion,editar')->name('puntos-certificacion.edit');
    Route::put('/puntos-certificacion/{puntos_certificacion}', [PuntoCertificacionController::class, 'update'])->middleware('permiso:puntos_certificacion,editar')->name('puntos-certificacion.update');
    Route::delete('/puntos-certificacion/{puntos_certificacion}', [PuntoCertificacionController::class, 'destroy'])->middleware('permiso:puntos_certificacion,eliminar')->name('puntos-certificacion.destroy');

    // Departamentos
    Route::get('/organigrama/departamentos', [AdminOrganigramaDepartamentoController::class, 'index'])->middleware('permiso:departamentos,ver')->name('organigrama.departamentos.index');
    Route::get('/organigrama/departamentos/create', [AdminOrganigramaDepartamentoController::class, 'create'])->middleware('permiso:departamentos,crear')->name('organigrama.departamentos.create');
    Route::post('/organigrama/departamentos', [AdminOrganigramaDepartamentoController::class, 'store'])->middleware('permiso:departamentos,crear')->name('organigrama.departamentos.store');
    Route::get('/organigrama/departamentos/{departamento}/edit', [AdminOrganigramaDepartamentoController::class, 'edit'])->middleware('permiso:departamentos,editar')->name('organigrama.departamentos.edit');
    Route::put('/organigrama/departamentos/{departamento}', [AdminOrganigramaDepartamentoController::class, 'update'])->middleware('permiso:departamentos,editar')->name('organigrama.departamentos.update');
    Route::delete('/organigrama/departamentos/{departamento}', [AdminOrganigramaDepartamentoController::class, 'destroy'])->middleware('permiso:departamentos,eliminar')->name('organigrama.departamentos.destroy');

    // Personas
    Route::get('/organigrama/personas', [AdminOrganigramaPersonaController::class, 'index'])->middleware('permiso:personas,ver')->name('organigrama.personas.index');
    Route::get('/organigrama/personas/create', [AdminOrganigramaPersonaController::class, 'create'])->middleware('permiso:personas,crear')->name('organigrama.personas.create');
    Route::post('/organigrama/personas', [AdminOrganigramaPersonaController::class, 'store'])->middleware('permiso:personas,crear')->name('organigrama.personas.store');
    Route::get('/organigrama/personas/{persona}/edit', [AdminOrganigramaPersonaController::class, 'edit'])->middleware('permiso:personas,editar')->name('organigrama.personas.edit');
    Route::put('/organigrama/personas/{persona}', [AdminOrganigramaPersonaController::class, 'update'])->middleware('permiso:personas,editar')->name('organigrama.personas.update');
    Route::delete('/organigrama/personas/{persona}', [AdminOrganigramaPersonaController::class, 'destroy'])->middleware('permiso:personas,eliminar')->name('organigrama.personas.destroy');

    // Solo admin puede gestionar usuarios y roles
    Route::middleware(['solo.admin'])->group(function () {
        Route::resource('usuarios', AdminUsuarioController::class);
        Route::resource('roles', RolController::class);
    });
});