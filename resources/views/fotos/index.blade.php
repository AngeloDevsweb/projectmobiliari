@extends('vendedor.layout')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Gestión de Fotos de Propiedades</h2>

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
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
            <div class="mb-4">
                <label for="id_propiedad" class="block text-gray-700 font-bold">Seleccionar Propiedad</label>

                <!-- Mensaje si no hay propiedades registradas -->
                @if ($propiedades->isEmpty())
                    <p class="text-gray-700">No tiene propiedades registradas. Registre una propiedad para añadir fotos.</p>
                @else
                    <select name="id_propiedad" id="id_propiedad" class="w-full p-2 border rounded-lg" required>
                        <option value="">Seleccione una propiedad</option>
                        @foreach ($propiedades as $propiedad)
                            <option value="{{ $propiedad->id }}">{{ $propiedad->titulo }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="mb-4">
                <label for="fotos" class="block text-gray-700 font-bold">Subir Fotos</label>
                <input type="file" name="fotos[]" id="fotos" class="w-full p-2 border rounded-lg" multiple required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Subir Fotos</button>
        </form>

        <!-- Listado de fotos -->
        <div class="mt-6">
            <h3 class="text-lg font-bold mb-4">Fotos Subidas</h3>

            <!-- Mensaje si no hay fotos -->
            @if ($fotos->isEmpty())
                <p class="text-gray-700">No hay fotos subidas para sus propiedades.</p>
            @else
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Propiedad</th>
                            <th class="px-4 py-2">Foto</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fotos as $foto)
                            <tr>
                                <td class="px-4 py-2">{{ $foto->propiedad->titulo }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $foto->url_foto) }}" alt="Foto" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('fotos.destroy', $foto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar esta foto?')">Eliminar</button>
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
