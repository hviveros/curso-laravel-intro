<?php

namespace App\Http\Controllers;

// Illuminate hace referencia a clases propias de Laravel
use Illuminate\Http\Request;
// Para poder generar las URLs amigables
use Illuminate\Support\Str;

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

    public function create (Post $post)
    {
        // Mostrar una vista formulario create
        return view('posts.create', ['post' => $post]);
    }

    // Para recuperar todo lo que envía un usuario, se usa la clase Request
    public function store (Request $request)
    {
        // La información del usuario logueado se encuentra en la clase $request
        // posts() -> hace referencia la relación usuario/post, se debe crear
        // create() -> se envía en un array toda la información requerida
        // para el slug, utilizar la misma técnica con la clase Str, se debe incluir arriba
        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body
        ]);

        // Luego. Redirigir
        return redirect()->route('posts.edit', $post);
    }

    public function edit (Post $post)
    {
        // Carpeta posts , archivo edit.blade.php , parámetro $post
        return view('posts.edit', ['post' => $post]);
    }

    public function destroy (Post $post)
    {
        // Al post que vino como parámetro, aplicar el método delete
        $post->delete();
        // Retornar a la lista de publicaciones
        return back();
    }
}
