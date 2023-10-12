<?php

namespace App\Http\Controllers;

// Illuminate hace referencia a clases propias de Laravel
use Illuminate\Http\Request;

// Importar modelo
use App\Models\Post;

class PostController extends Controller
{
    // Configuramos los diferentes métodos de este recurso
    public function index()
    {
        // Retorna la vista, y un array con el contenido de la BD
        // Con esto trae todos los registros, ahora se trabaja en la vista
        return view('posts.index', [
            'posts' => Post::latest()->paginate(),
        ]);
    }

    public function destroy (Post $post)
    {
        // Al post que vino como parámetro, aplicar el método delete
        $post->delete();
        // Retornar a la lista de publicaciones
        return back();
    }
}
