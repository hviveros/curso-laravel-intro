<?php

namespace App\Http\Controllers;

// Illuminate hace referencia a clases propias de Laravel
use Illuminate\Http\Request;

// Recurrimos al modelo Post
use App\Models\Post;

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
        // // Listado de publicaciones
        // // Consulta a la base de datos, ya no se utilizará este ejemplo
        // $posts = [
        //     ['id' => 1, 'title' => 'PHP',       'slug' => 'php'],
        //     ['id' => 2, 'title' => 'Laravel',   'slug' => 'laravel']
        // ];


        // Sintaxis Eloquent
        // get() -> trae automáticamente TODOS los posts de la bd
        // $posts = Post::get();        
        // Otro método: first() traer el primer registro
        // $post = Post::first();
        // find(id) -> trae un registro de un id específico
        // $post = Post::find(21);
        // Es la forma más sofisticada de debugger, como alternativa a var_dump();
        // dd($post);

        // Mostrar registros en orden descendente, y que estén paginados(de 5 en 5)
        $posts = Post::latest()->paginate(5);
        // Para poder ordenar de manera descendente el ‘‘id’’ ;
        // $posts = Post::latest('id')->first()->paginate(5);

        return view('blog', ['posts' => $posts]);   
    }

    // Sintaxis Eloquent
    public function post(Post $post)
    {
        // Vista de una publicación en específico
        // $post = $slug;
        return view('post', ['post' => $post]);
    }
}
