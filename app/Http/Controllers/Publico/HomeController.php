<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Testimonio;
use App\Models\Agenda;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('publicado', true)
            ->orderBy('created_at', 'desc')->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $bannerNoticias = Noticia::where('publicado', true)
            ->where('destacado_banner', true)
            ->orderBy('orden_banner', 'asc')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $testimonios = Testimonio::where('publicado', true)
            ->orderBy('created_at', 'desc')->orderBy('id', 'desc')
            ->get();

        $agenda = Agenda::where('publicado', true)
            ->orderBy('created_at', 'desc')->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('publico.index', compact('noticias', 'bannerNoticias', 'testimonios', 'agenda'));
    }
}