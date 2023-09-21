<?php

// Solicitudes HTTP de usuarios
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Route::get      | Consulta
 * Route::post     | Guarda
 * Route::delete   | Elimina
 * Route::put      | Actualiza
 */

Route::get('/', function () {
    // return view('welcome');
    // return "Ruta home";
    // Usamos la función llamada view()
    return view('home');
    // Al final, nombramos cada ruta con name()
})->name('home');

// Listado de publicaciones
Route::get('blog', function () {
    // Consulta a la base de datos
    $posts = [
        ['id' => 1, 'title' => 'PHP',       'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel',   'slug' => 'laravel']
    ];
    return view('blog', ['posts' => $posts]);
})->name('blog');

// Vista de una publicación en específico
Route::get('blog/{slug}', function ($slug) {
    $post = $slug;
    return view('post', ['post' => $post]);
})->name('post');

Route::get('buscar', function (Request $request) {
    // accedemos al objeto $request y su método all() para que muestre todos los resultados
    return $request->all();
});