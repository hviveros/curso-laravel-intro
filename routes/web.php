<?php

// Solicitudes HTTP de usuarios
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Las peticiones ahora se realizan a través del controlador PageController
 // Ya no se trabaja con funciones anónimas
// Route::get('/', [PageController::class, 'home'])->name('home');


// Route::get('blog', [PageController::class, 'blog'])->name('blog');

// Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');

// Route::get('buscar', function (Request $request) {
//     // accedemos al objeto $request y su método all() para que muestre todos los resultados
//     return $request->all();
// });


// Se crea un grupo, se desarrolla soluciones en un único archivo

// 1. La ruta invoca a un controlador
// 2. El controlador se encarga de las peticiones y solicitudes
// 3. Se muestra en una vista
Route::controller(PageController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('blog', 'blog')->name('blog');

    // Sintaxis Eloquent
    Route::get('blog/{post:slug}', 'post')->name('post');

});