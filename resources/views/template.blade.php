<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Proyecto Web Laravel')</title>

    <!-- Importar archivos públicos CSS y JS de vite, versiones anteriores de Laravel -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <!-- Forma actualizada -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">

            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="h-12"></a>

                <!-- En action, para acceder a la ruta home -->
                <!-- En value, request('search') para que el texto buscado quede en el input -->
                <!-- flex-grow, indicamos que de los 2 elementos, el formulario es el que va a crecer -->
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}"
                    class="border border-gray-200 rounded py-2 px-4 w-1/2">
                </form>
            </div>

            <!-- Verifica si se ha iniciado sesión -->
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth

        </header>

        <!-- línea transparente con degradado gris -->
        <div class="opacity-60 h-px mb-8" style="
            background: linear-gradient(to right, 
				rgba(200, 200, 200, 0) 0%,
				rgba(200, 200, 200, 1) 30%,
				rgba(200, 200, 200, 1) 70%,
				rgba(200, 200, 200, 0) 100%
			);
        ">

        </div>
        
        <!-- Directiva -->
        @yield('content')

        <p class="py-16">
            <!-- mx-auto alinear al centro -->
            <img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
        </p>

    </div>
</body>
</html>