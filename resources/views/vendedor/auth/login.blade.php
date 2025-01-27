<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Vendedor</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cover bg-center" style="background-image: url('{{asset('images/casa1.jpg')}}');">

    <!-- Filtro de opacidad en el fondo -->
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <div class="flex items-center justify-center min-h-screen relative z-10">
        <div class="bg-slate-100 p-8 rounded-lg shadow-xl max-w-sm w-full">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Login de Vendedor</h1>
            
            <form action="{{ route('vendedor.login.submit') }}" method="POST">
                @csrf

                <!-- Campo Correo Electrónico -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" required placeholder="email@example.com"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Campo Contraseña -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" required placeholder="tu contraseña"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Botón de Enviar -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full py-2 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
            <p class="text-slate-600 text-lg">No tienes cuenta? <a href="{{ route('vendedor.register') }}" class="bg-indigo-500 text-sm rounded-md font-semibold text-white p-2">Registrate</a></p>
        </div>
    </div>
</body>
</html>
