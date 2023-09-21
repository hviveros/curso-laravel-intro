<!-- Ya no es necesaria toda la estructura inicial HTML -->
<!-- Heredamos todo desde template.blade.php -->
@extends('template')

@section('title', 'Post')

@section('content')

    <h1>Post</h1>
    <h2>Detalle del post</h2>

    {{ $post }}

@endsection