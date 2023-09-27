<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // return view('welcome');
        // return "Ruta home";
        // Usamos la función llamada view()
        return view('home');
        // Al final, nombramos cada ruta con name()
    }

    public function blog()
    {   
        // Listado de publicaciones
        // Consulta a la base de datos
        $posts = [
            ['id' => 1, 'title' => 'PHP',       'slug' => 'php'],
            ['id' => 2, 'title' => 'Laravel',   'slug' => 'laravel']
        ];
        return view('blog', ['posts' => $posts]);        
    }

    public function post($slug)
    {
        // Vista de una publicación en específico
        $post = $slug;
        return view('post', ['post' => $post]);
    }
}
