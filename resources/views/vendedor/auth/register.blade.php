<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vendedor</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/casa2.jpg') }}');">
    <!-- Filtro de opacidad en el fondo -->
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <!-- Formulario con z-index para que esté por encima -->
    <div class="flex items-center justify-center min-h-screen relative z-10">
        <div class="bg-slate-100 p-8 rounded-lg shadow-xl max-w-3xl w-full overflow-hidden">
            <h1 class="text-3xl font-semibold text-center mb-6 text-gray-700">Registro de Vendedor</h1>

            <form action="{{ route('vendedor.register.submit') }}" method="POST">
                @csrf

                <!-- Fila 1: Nombre y Correo Electrónico -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" required placeholder="ingresa tu nombre"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" required placeholder="email@example.com"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Fila 2: Contraseña y Confirmar Contraseña -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" required placeholder="tu contraseña"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" required placeholder="confirma contraseña"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Fila 3: Tipo de Vendedor y Redes Sociales -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="tipo_vendedor" class="block text-sm font-medium text-gray-700">Tipo de Vendedor</label>
                        <select name="tipo_vendedor" required
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="dueño de propiedad">Dueño de Propiedad</option>
                            <option value="vendedor externo">Vendedor Externo</option>
                        </select>
                    </div>

                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                        <input type="text" name="facebook" placeholder="ingresa tu facebook(opcional)"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input type="text" name="instagram" placeholder="ingresa tu instagram(opcional)"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Botón de Registro -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full py-2 bg-indigo-700 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
