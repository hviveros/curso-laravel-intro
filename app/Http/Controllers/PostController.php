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
        // Validaciones
        // Ambos campos deben ser obligatorios
        // Regla unique: indicamos que de la tabla Posts, el campo title debe ser único
        // Regla max: indicamos que este campo no puede sobrepasar 255 carateres,
        // Ver todas las validaciones en la documentación
        $request->validate([
            'title' => 'required|unique:posts,title|max:255',
            'body'  => 'required',
        ], [
            'title.required'    => 'Este campo es requerido',
            'title.unique'      => 'Ya existe un post con este título, ingrese otro',
            'title.max'         => 'Este campo no puede pasar de 255 carateres',
            'body.required'     => 'Este campo es requerido',
        ]);

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

    // Para actualizar, agregar otro parámetro, que son los registros que quiero actualizar
    public function update (Request $request, Post $post)
    {

        // Validaciones
        // Ambos campos deben ser obligatorios
        // Regla unique: indicamos que de la tabla Posts, el campo title debe ser único
        // Regla max: indicamos que este campo no puede sobrepasar 255 carateres,
        // Ver todas las validaciones en la documentación
        $request->validate([
            'title' => 'required|unique:posts,title|max:255',
            'body'  => 'required',
        ], [
            'title.required'    => 'Este campo es requerido',
            'title.unique'      => 'Ya existe un post con este título, ingrese otro',
            'title.max'         => 'Este campo no puede pasar de 255 carateres',
            'body.required'     => 'Este campo es requerido',
        ]);

        // Para actualizar, sólo se necesita los datos a actualizar
        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body
        ]);

        // Luego. Redirigir al listado de publicaciones
        return redirect()->route('posts.index');
    }

    public function destroy (Post $post)
    {
        // Al post que vino como parámetro, aplicar el método delete
        $post->delete();
        // Retornar a la lista de publicaciones
        return back();
    }
}
