<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Proyecto Web Laravel')</title>
</head>
<body>
    <p>
        <!-- Función de rutas y se coloca el name del archivo rutas web -->
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('blog') }}">Blog</a>

        <!-- Verifica si se ha iniciado sesión -->
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </p>

    <hr>

    <!-- Directiva -->
    @yield('content')
</body>
</html>