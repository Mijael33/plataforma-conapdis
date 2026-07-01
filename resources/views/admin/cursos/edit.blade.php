@extends('layouts.admin')

@section('titulo', 'Editar Curso')

@section('contenido')
<div class="container-fluid">
    <h2 style="color: #1a3b5d; font-weight: 700;" class="mb-4">Editar Curso</h2>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.cursos.update', $curso) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Título del Curso</label>
                    <input type="text" name="titulo" class="form-control rounded-3" value="{{ old('titulo', $curso->titulo) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Video del Curso (URL YouTube)</label>
                    <input type="url" name="video_url" class="form-control rounded-3" value="{{ old('video_url', $curso->video_url) }}" placeholder="https://www.youtube.com/watch?v=...">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Link del Curso (URL)</label>
                    <input type="url" name="link_curso" class="form-control rounded-3" value="{{ old('link_curso', $curso->link_curso) }}" placeholder="https://...">
                    <small class="text-muted">Si se llena, aparece el botón "Acceder al Curso"</small>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control rounded-3" rows="3" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Contenido (Editor enriquecido)</label>
                    <textarea name="contenido" id="editor" class="form-control rounded-3" rows="8">{{ old('contenido', $curso->contenido) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Imagen</label>
                    @if($curso->imagen)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $curso->imagen) }}" style="max-width: 200px; border-radius: 8px;">
                    </div>
                    @endif
                    <input type="file" name="imagen" class="form-control rounded-3">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control rounded-3" value="{{ old('fecha_inicio', $curso->fecha_inicio->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Fecha Final</label>
                    <input type="date" name="fecha_final" class="form-control rounded-3" value="{{ old('fecha_final', $curso->fecha_final->format('Y-m-d')) }}" required>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="publicado" value="1" class="form-check-input" {{ $curso->publicado ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold">Publicado</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success rounded-pill px-4">Actualizar Curso</button>
                    <a href="{{ route('admin.cursos.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@7.6.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 500,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
        ],
        toolbar: 'undo redo | blocks fontsize fontfamily | bold italic underline strikethrough subscript superscript | forecolor backcolor | removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | link image media table blockquote | charmap emoticons | code fullscreen preview | help',
        font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 32pt 36pt 48pt 64pt',
        font_family_formats: 'Arial=arial,helvetica,sans-serif; Georgia=georgia,palatino; Times New Roman=times new roman,times; Courier New=courier new,courier,monospace; Verdana=verdana,geneva;',
        image_uploadtab: true,
        images_upload_handler: function (blobInfo, progress) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = () => { resolve(reader.result); };
                reader.onerror = error => reject(error);
                reader.readAsDataURL(blobInfo.blob());
            });
        },
        media_live_embeds: true,
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }',
        language: 'es',
        setup: function(editor) {
            editor.on('BeforeSetContent', function(e) {
                e.content = e.content.replace(
                    /https?:\/\/(?:www\.)?youtube\.com\/shorts\/([a-zA-Z0-9_-]+)/g,
                    'https://www.youtube.com/watch?v=$1'
                );
            });
        },
        extended_valid_elements: 'iframe[src|width|height|frameborder|allowfullscreen|style|title]',
        urlconverter_callback: function(url, node, on_save, name) {
            if (url.includes('youtube.com/shorts/')) {
                url = url.replace(/\/shorts\//, '/watch?v=');
            }
            return url;
        },
        paste_preprocess: function(plugin, args) {
            args.content = args.content.replace(
                /https?:\/\/(?:www\.)?youtube\.com\/shorts\/([a-zA-Z0-9_-]+)/g,
                'https://www.youtube.com/watch?v=$1'
            );
        }
    });
</script>
<style>
    .tox-tinymce { border-radius: 12px !important; }
</style>
@endsection