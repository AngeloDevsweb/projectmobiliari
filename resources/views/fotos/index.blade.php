@extends('vendedor.layout')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Gestión de Fotos de Propiedades</h2>

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para subir fotos -->
        <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="id_propiedad" class="block text-gray-700 font-medium mb-2">Seleccionar Propiedad</label>

                    <!-- Mensaje si no hay propiedades registradas -->
                    @if ($propiedades->isEmpty())
                        <p class="text-gray-700">No tiene propiedades registradas. Registre una propiedad para añadir fotos.</p>
                    @else
                        <select name="id_propiedad" id="id_propiedad" class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Seleccione una propiedad</option>
                            @foreach ($propiedades as $propiedad)
                                <option value="{{ $propiedad->id }}">{{ $propiedad->titulo }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div>
                    <label for="fotos" class="block text-gray-700 font-medium mb-2">Subir Fotos</label>
                    <input type="file" name="fotos[]" id="fotos" class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" multiple required>
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Subir Fotos</button>
        </form>

        <!-- Listado de fotos -->
        <div class="mt-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Fotos Subidas</h3>

            <!-- Mensaje si no hay fotos -->
            @if ($fotos->isEmpty())
                <p class="text-gray-700">No hay fotos subidas para sus propiedades.</p>
            @else
                <table class="min-w-full table-auto bg-gray-50 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">Propiedad</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Foto</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fotos as $foto)
                            <tr class="border-b hover:bg-gray-100 transition duration-300">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $foto->propiedad->titulo }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $foto->url_foto) }}" alt="Foto" class="w-24 h-24 object-cover rounded-lg mx-auto">
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('fotos.destroy', $foto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('¿Estás seguro de que deseas eliminar esta foto?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
