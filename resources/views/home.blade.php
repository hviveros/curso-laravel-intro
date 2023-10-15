<!-- Ya no es preciso toda la estructura inicial HTML -->
@extends('template')

@section('content')
    <div class="bg-gray-700 px-20 py-16 rounded-lg mb-8 relative overflow-hidden">
        <!-- información destacada -->
        <span class="text-xs uppercase text-gray-700 bg-gray-400 rounded-full px-2 py-1">Programación</span>
        <h1 class="text-3xl text-white mt-4">Blog</h1>
        <p class="text-sm text-gray-400 mt-2">Proyecto de desarrollo web</p>

        <img src="{{ asset('images/dev.png') }}" class="absolute right-0 bottom-0 opacity-20">
    </div>

    <div class="px-4">
        <!-- Todos los artículos -->
        <h1 class="text-2xl mb-8 text-gray-900">Contenido técnico</h1>

        <!-- Grid CSS -->
        <div class="grid grid-cols-1 gap-4 mb-4">
            <!-- Sintaxis de Laravel -->
            @foreach ($posts as $post)
                <a href="{{ route('post', $post->slug) }}" class="bg-gray-50 rounded-g px-6 py-4">
                    <!-- Estilos de Tailwind CSS -->
                    <p class="text-xs flex items-center gap-2">
                        <span class="uppercase text-gray-700 bg-gray-200 rounded-full px-2 py-1">Tutorial</span>
                        <!-- Mostramos la fecha con un formato más amigable -->
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                    </p>
                    <h2 class="text-lg text-blue-900 mt-3">{{ $post->title }}</h2>
                </a>
            @endforeach
        </div>


        <!-- Paginación  -->
        {{ $posts->links() }}

    </div>
@endsection
