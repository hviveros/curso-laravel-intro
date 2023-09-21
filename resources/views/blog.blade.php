<!-- Ya no es preciso toda la estructura inicial HTML -->
@extends('template')

@section('title', 'Blog')

@section('content')

    <h1>Blog</h1>
    <h2>Listado de publicaciones</h2>

    <!-- Sintaxis de Laravel -->
    @foreach ($posts as $post)
    <p>
        <strong>{{ $post['id'] }}</strong> 
        <!-- Función de route, se agrega el parámetro adicional, en este caso el id -->
        <a href=" {{ route('post', $post['slug']) }} ">{{ $post['title'] }}</a>
    </p>
    @endforeach

@endsection