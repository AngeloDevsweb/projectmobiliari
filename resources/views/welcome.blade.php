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
                <source src="https://videos.pexels.com/video-files/3773486/3773486-hd_1920_1080_30fps.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="absolute inset-0 bg-black/70"></div> <!-- Overlay -->

            <!-- Content -->
            <div class="relative z-10 flex items-center justify-center min-h-screen">
                <div class="bg-white/90 dark:bg-gray-900/80 shadow-2xl rounded-2xl p-8 max-w-md w-full text-center backdrop-blur-sm">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Bienvenido</h1>
                    <p class="text-gray-700 dark:text-gray-400 mb-6">
                        Accede a tu cuenta o regístrate para empezar a usar la aplicación.
                    </p>
                    
                    <!-- Buttons -->
                    <div class="space-y-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="w-full px-4 py-2 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none transition duration-300">
                                    Ir al Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="w-full px-4 mr-2 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none transition duration-300">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="w-full px-4 py-2 bg-indigo-700 text-white font-semibold rounded-lg shadow-md hover:bg-teal-600 focus:outline-none transition duration-300">
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
