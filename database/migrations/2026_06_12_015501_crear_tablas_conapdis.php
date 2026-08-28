<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->boolean('es_admin')->default(false);
            $table->json('permisos')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->string('cargo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('rol_id')->nullable()->constrained('roles')->onDelete('set null');
            $table->boolean('activo')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        // Noticias
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('extracto');
            $table->longText('contenido');
            $table->string('categoria');
            $table->string('tipo')->default('conapdis-informa');
            $table->string('imagen')->nullable();
            $table->timestamp('fecha_publicacion')->nullable();
            $table->boolean('publicado')->default(false);
            $table->boolean('destacado_banner')->default(false);
            $table->integer('orden_banner')->default(0);
            $table->timestamps();
        });

        // Programas de Noticias (dinámico, como Enlaces del menú)
        Schema::create('programas_noticias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Cursos
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descripcion');
            $table->longText('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->string('video_url')->nullable();
            $table->string('link_curso')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->boolean('publicado')->default(false);
            $table->timestamps();
        });

        // Testimonios
        Schema::create('testimonios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_autor');
            $table->string('cargo_autor');
            $table->string('foto_autor')->nullable();
            $table->text('testimonio');
            $table->boolean('publicado')->default(true);
            $table->timestamps();
        });

        // Agenda
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('extracto')->nullable();
            $table->longText('contenido')->nullable();
            $table->date('fecha');
            $table->string('hora')->nullable();
            $table->string('lugar')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('publicado')->default(true);
            $table->timestamps();
        });

        // Departamentos del organigrama
        Schema::create('organigrama_departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('color')->nullable()->default('#003097');
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Personas del organigrama
        Schema::create('organigrama_personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departamento_id')->constrained('organigrama_departamentos')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cargo');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Redes Sociales
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->enum('red', ['instagram', 'facebook', 'tiktok', 'youtube', 'telegram']);
            $table->string('nombre_cuenta');
            $table->string('vinculo');
            $table->boolean('destacado')->default(false);
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Enlaces del menú
        Schema::create('enlaces_menu', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('vinculo');
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Instituciones Aliadas
        Schema::create('instituciones_aliadas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->string('vinculo')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Línea de Tiempo Histórica
        Schema::create('linea_tiempo', function (Blueprint $table) {
            $table->id();
            $table->integer('anio');
            $table->string('titulo');
            $table->text('descripcion');
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Coordinaciones Estadales
        Schema::create('coordinaciones_estadales', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->text('direccion');
            $table->string('telefono')->nullable();
            $table->string('coordinador');
            $table->string('enlace_mapa')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Puntos de Certificación
        Schema::create('puntos_certificacion', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->text('ubicacion');
            $table->date('fecha');
            $table->string('hora')->nullable();
            $table->string('hora_fin')->nullable();
            $table->string('dias')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Marco Jurídico
        Schema::create('marco_juridico', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('documento')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marco_juridico');
        Schema::dropIfExists('puntos_certificacion');
        Schema::dropIfExists('coordinaciones_estadales');
        Schema::dropIfExists('linea_tiempo');
        Schema::dropIfExists('instituciones_aliadas');
        Schema::dropIfExists('enlaces_menu');
        Schema::dropIfExists('redes_sociales');
        Schema::dropIfExists('organigrama_personas');
        Schema::dropIfExists('organigrama_departamentos');
        Schema::dropIfExists('agenda');
        Schema::dropIfExists('testimonios');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('programas_noticias');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};