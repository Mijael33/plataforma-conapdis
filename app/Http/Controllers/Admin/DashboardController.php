<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Curso;
use App\Models\Testimonio;
use App\Models\User;
use App\Models\Agenda;
use App\Models\RedSocial;
use App\Models\EnlaceMenu;
use App\Models\InstitucionAliada;
use App\Models\LineaTiempo;
use App\Models\CoordinacionEstadal;
use App\Models\PuntoCertificacion;
use App\Models\MarcoJuridico;
use App\Models\OrganigramaDepartamento;
use App\Models\OrganigramaPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use ZipArchive;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNoticias = Noticia::count();
        $totalCursos = Curso::count();
        $totalTestimonios = Testimonio::count();
        $totalUsuarios = User::count();
        $totalAgenda = Agenda::count();
        $totalRedes = RedSocial::count();
        $totalEnlaces = EnlaceMenu::count();
        $totalInstituciones = InstitucionAliada::count();
        $totalLineaTiempo = LineaTiempo::count();
        $totalCoordinaciones = CoordinacionEstadal::count();
        $totalPuntosCertificacion = PuntoCertificacion::count();
        $totalMarcoJuridico = MarcoJuridico::count();
        $totalDepartamentos = OrganigramaDepartamento::count();
        $totalPersonas = OrganigramaPersona::count();

        return view('admin.dashboard.index', compact(
            'totalNoticias',
            'totalCursos',
            'totalTestimonios',
            'totalUsuarios',
            'totalAgenda',
            'totalRedes',
            'totalEnlaces',
            'totalInstituciones',
            'totalLineaTiempo',
            'totalCoordinaciones',
            'totalPuntosCertificacion',
            'totalMarcoJuridico',
            'totalDepartamentos',
            'totalPersonas'
        ));
    }

    private function limpiarSoloDatos()
    {
        DB::statement('SET session_replication_role = replica');

        $tablas = [
            'organigrama_personas',
            'organigrama_departamentos',
            'marco_juridico',
            'puntos_certificacion',
            'coordinaciones_estadales',
            'linea_tiempo',
            'instituciones_aliadas',
            'enlaces_menu',
            'redes_sociales',
            'agenda',
            'testimonios',
            'cursos',
            'noticias',
        ];

        foreach ($tablas as $tabla) {
            try {
                DB::table($tabla)->delete();
            } catch (\Exception $e) {
                // continuar
            }
        }

        DB::statement('SET session_replication_role = origin');
    }

    public function limpiar()
    {
        try {
            $this->limpiarSoloDatos();

            $carpetasImagenes = [
                'agenda',
                'cursos',
                'instituciones',
                'marco-juridico',
                'noticias',
                'organigrama',
                'testimonios',
            ];

            foreach ($carpetasImagenes as $carpeta) {
                $path = storage_path('app/public/' . $carpeta);
                if (File::isDirectory($path)) {
                    File::cleanDirectory($path);
                }
            }

            Artisan::call('optimize:clear');
            Artisan::call('storage:link');

            return redirect()->route('admin.dashboard')
                ->with('success', '✅ Todo limpio: contenido eliminado, imágenes borradas y caché limpiada. Los usuarios se conservan intactos.');
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ Error al limpiar: ' . $e->getMessage());
        }
    }

    public function exportar()
    {
        try {
            $fecha = date('Y-m-d_H-i-s');
            $zipFilename = 'respaldo_conapdis_' . $fecha . '.zip';
            $zipPath = storage_path('app/' . $zipFilename);

            $zip = new ZipArchive();
            if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                throw new \Exception('No se pudo crear el archivo ZIP');
            }

            $tablas = [
                'users',
                'noticias',
                'cursos',
                'testimonios',
                'agenda',
                'organigrama_departamentos',
                'organigrama_personas',
                'redes_sociales',
                'enlaces_menu',
                'instituciones_aliadas',
                'linea_tiempo',
                'coordinaciones_estadales',
                'puntos_certificacion',
                'marco_juridico',
            ];

            $respaldo = [];
            foreach ($tablas as $tabla) {
                try {
                    $datos = DB::table($tabla)->get()->toArray();
                    $respaldo[$tabla] = $datos;
                } catch (\Exception $e) {
                    $respaldo[$tabla] = [];
                }
            }

            $respaldo['_metadatos'] = [
                'fecha' => now()->toDateTimeString(),
                'app_name' => config('app.name'),
                'conexion' => config('database.default'),
                'version' => '2.0',
            ];

            $json = json_encode($respaldo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $zip->addFromString('base_datos.json', $json);

            $imagenesVinculadas = $this->obtenerImagenesVinculadas();

            foreach ($imagenesVinculadas as $rutaRelativa) {
                $rutaCompleta = public_path('storage/' . $rutaRelativa);
                if (File::exists($rutaCompleta)) {
                    $zip->addFile($rutaCompleta, 'imagenes/' . $rutaRelativa);
                }
            }

            $zip->close();

            return Response::download($zipPath, $zipFilename, [
                'Content-Type' => 'application/zip',
            ])->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ Error al exportar: ' . $e->getMessage());
        }
    }

    private function obtenerImagenesVinculadas(): array
    {
        $imagenes = [];

        $noticias = DB::table('noticias')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($noticias as $img) {
            $imagenes[] = $img;
        }

        $cursos = DB::table('cursos')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($cursos as $img) {
            $imagenes[] = $img;
        }

        $testimonios = DB::table('testimonios')->whereNotNull('foto_autor')->where('foto_autor', '!=', '')->pluck('foto_autor');
        foreach ($testimonios as $img) {
            $imagenes[] = $img;
        }

        $agenda = DB::table('agenda')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($agenda as $img) {
            $imagenes[] = $img;
        }

        $instituciones = DB::table('instituciones_aliadas')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($instituciones as $img) {
            $imagenes[] = $img;
        }

        $marcoImagenes = DB::table('marco_juridico')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($marcoImagenes as $img) {
            $imagenes[] = $img;
        }

        $marcoDocs = DB::table('marco_juridico')->whereNotNull('documento')->where('documento', '!=', '')->pluck('documento');
        foreach ($marcoDocs as $doc) {
            $imagenes[] = $doc;
        }

        $deptos = DB::table('organigrama_departamentos')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($deptos as $img) {
            $imagenes[] = $img;
        }

        $personas = DB::table('organigrama_personas')->whereNotNull('imagen')->where('imagen', '!=', '')->pluck('imagen');
        foreach ($personas as $img) {
            $imagenes[] = $img;
        }

        return array_unique($imagenes);
    }

    public function importar(Request $request)
    {
        $request->validate([
            'archivo_respaldo' => 'required|file|mimes:json,zip|max:102400',
        ]);

        try {
            $archivo = $request->file('archivo_respaldo');
            $extension = $archivo->getClientOriginalExtension();

            if ($extension === 'zip') {
                return $this->importarZIP($archivo);
            } else {
                return $this->importarJSON($archivo);
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ Error al importar: ' . $e->getMessage());
        }
    }

    private function importarZIP($archivo)
    {
        $tempDir = storage_path('app/temp_import_' . time());
        File::makeDirectory($tempDir, 0755, true);

        $zip = new ZipArchive();
        if ($zip->open($archivo->getRealPath()) !== true) {
            File::deleteDirectory($tempDir);
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ No se pudo abrir el archivo ZIP.');
        }

        $zip->extractTo($tempDir);
        $zip->close();

        $jsonPath = $tempDir . '/base_datos.json';
        if (!File::exists($jsonPath)) {
            File::deleteDirectory($tempDir);
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ El ZIP no contiene el archivo base_datos.json');
        }

        $json = json_decode(File::get($jsonPath), true);
        if (!$json || !isset($json['_metadatos'])) {
            File::deleteDirectory($tempDir);
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ El archivo base_datos.json no tiene el formato correcto.');
        }

        // 1. Limpiar solo datos (sin borrar imágenes)
        $this->limpiarSoloDatos();

        // 2. Copiar imágenes del ZIP al storage público
        $imagenesPath = $tempDir . '/imagenes';
        if (File::isDirectory($imagenesPath)) {
            $archivos = File::allFiles($imagenesPath);
            foreach ($archivos as $archivo) {
                $rutaRelativa = $archivo->getRelativePathname();
                $rutaRelativa = str_replace('\\', '/', $rutaRelativa);
                $rutaDestino = public_path('storage/' . $rutaRelativa);
                $carpetaDestino = dirname($rutaDestino);

                if (!File::isDirectory($carpetaDestino)) {
                    File::makeDirectory($carpetaDestino, 0755, true);
                }

                File::copy($archivo->getPathname(), $rutaDestino, true);
            }
        }

        // 3. Insertar datos
        DB::statement('SET session_replication_role = replica');

        $tablas = [
            'users',
            'noticias',
            'cursos',
            'testimonios',
            'agenda',
            'organigrama_departamentos',
            'organigrama_personas',
            'redes_sociales',
            'enlaces_menu',
            'instituciones_aliadas',
            'linea_tiempo',
            'coordinaciones_estadales',
            'puntos_certificacion',
            'marco_juridico',
        ];

        foreach ($tablas as $tabla) {
            if (isset($json[$tabla]) && is_array($json[$tabla])) {
                foreach ($json[$tabla] as $fila) {
                    try {
                        DB::table($tabla)->insert((array) $fila);
                    } catch (\Exception $e) {
                        // continuar
                    }
                }
            }
        }

        DB::statement('SET session_replication_role = origin');

        File::deleteDirectory($tempDir);

        Artisan::call('optimize:clear');
        Artisan::call('storage:link');

        return redirect()->route('admin.dashboard')
            ->with('success', '✅ Respaldo importado correctamente. Datos e imágenes restaurados. Usuarios conservados.');
    }

    private function importarJSON($archivo)
    {
        $json = json_decode(file_get_contents($archivo->getRealPath()), true);

        if (!$json || !isset($json['_metadatos'])) {
            return redirect()->route('admin.dashboard')
                ->with('error', '❌ El archivo no tiene el formato correcto.');
        }

        $this->limpiarSoloDatos();

        DB::statement('SET session_replication_role = replica');

        $tablas = [
            'users',
            'noticias',
            'cursos',
            'testimonios',
            'agenda',
            'organigrama_departamentos',
            'organigrama_personas',
            'redes_sociales',
            'enlaces_menu',
            'instituciones_aliadas',
            'linea_tiempo',
            'coordinaciones_estadales',
            'puntos_certificacion',
            'marco_juridico',
        ];

        foreach ($tablas as $tabla) {
            if (isset($json[$tabla]) && is_array($json[$tabla])) {
                foreach ($json[$tabla] as $fila) {
                    try {
                        DB::table($tabla)->insert((array) $fila);
                    } catch (\Exception $e) {
                        // continuar
                    }
                }
            }
        }

        DB::statement('SET session_replication_role = origin');

        Artisan::call('optimize:clear');

        return redirect()->route('admin.dashboard')
            ->with('success', '✅ Base de datos importada correctamente desde JSON. (Sin imágenes)');
    }
}