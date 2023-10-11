<?php

namespace App\Http\Controllers;

// Illuminate hace referencia a clases propias de Laravel
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Configuramos los diferentes métodos de este recurso
    public function index()
    {
        return view('posts.index');
    }
}
