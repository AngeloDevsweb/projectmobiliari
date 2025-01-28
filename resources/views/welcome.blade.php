<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AppInmobiliaria</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- Video Background -->
        <div class="relative min-h-screen overflow-hidden">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                <source src="https://videos.pexels.com/video-files/5469108/5469108-sd_640_360_24fps.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="absolute inset-0 bg-black/60"></div> <!-- Overlay -->

            <!-- Content -->
            <div class="relative z-10 flex items-center justify-center min-h-screen">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 max-w-sm w-full text-center">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Bienvenido</h1>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Accede a tu cuenta o regístrate para empezar a usar la aplicación.
                    </p>
                    
                    <!-- Buttons -->
                    <div class="space-y-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none">
                                    Ir al Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none">
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="absolute bottom-0 w-full text-center py-4 text-white text-sm">
                AppInmobi - All rights reserved 2025
            </footer>
        </div>
    </body>
</html>
