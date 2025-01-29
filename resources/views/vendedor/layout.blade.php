<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vendedor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-indigo-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo o Título -->
                <div class="flex items-center">
                    <a href="{{ route('vendedor.dashboard') }}" class="text-xl font-bold text-gray-100">Mi Dashboard</a>
                </div>

                <!-- Menú de navegación -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('fotos.index') }}" class="text-gray-100 hover:text-gray-900">Mis Fotos</a>

                    <!-- Dropdown Perfil -->
                   <!-- Dropdown Perfil -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-100 hover:text-gray-900 focus:outline-none">
                            <span>{{ Auth::guard('vendedores')->user()->nombre }}</span>
                            <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <form action="{{ route('vendedor.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="py-8">
        @yield('content') {{-- Aquí cargaremos las vistas específicas --}}
    </main>
</body>
</html>
