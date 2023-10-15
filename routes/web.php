<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controlador propio del proyecto
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

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
// Se crea un grupo, se desarrolla soluciones en un único archivo
// 1. La ruta invoca a un controlador
// 2. El controlador se encarga de las peticiones y solicitudes
// 3. Se muestra en una vista
Route::controller(PageController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    // Blog, ya no es necesario
    // Route::get('blog', 'blog')->name('blog');
    // Sintaxis Eloquent
    Route::get('blog/{post:slug}', 'post')->name('post');

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Retiramos de aquí la seguridad ->middleware(['auth', 'verified'])
Route::redirect('dashboard', 'posts')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except(['show']);

require __DIR__.'/auth.php';
