<!-- Ya no es necesaria toda la estructura inicial HTML -->
<!-- Heredamos todo desde template.blade.php -->
@extends('template')

@section('title', 'Post')

@section('content')

    <!-- objeto->propiedad -->
    <h1>{{ $post->title }}</h1>
    <p>
        {{ $post->body }}
    </p>

@endsection