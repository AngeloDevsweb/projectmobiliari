<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propiedades inmobiliarias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Formulario de filtros -->
                <form method="GET" action="{{ route('dashboard') }}" class="mb-6 flex flex-wrap gap-4">
                    <!-- Filtro por precio mínimo -->
                    <div>
                        <label for="precio_min" class="block text-sm font-medium text-gray-700">Precio mínimo</label>
                        <input type="number" name="precio_min" id="precio_min" value="{{ $filtros['precio_min'] ?? '' }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Filtro por precio máximo -->
                    <div>
                        <label for="precio_max" class="block text-sm font-medium text-gray-700">Precio máximo</label>
                        <input type="number" name="precio_max" id="precio_max" value="{{ $filtros['precio_max'] ?? '' }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Filtro por tipo de operación -->
                    <div>
                        <label for="tipo_operacion" class="block text-sm font-medium text-gray-700">Tipo de operación</label>
                        <select name="tipo_operacion" id="tipo_operacion" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">-- Seleccionar --</option>
                            <option value="venta" {{ ($filtros['tipo_operacion'] ?? '') === 'venta' ? 'selected' : '' }}>Venta</option>
                            <option value="alquiler" {{ ($filtros['tipo_operacion'] ?? '') === 'alquiler' ? 'selected' : '' }}>Alquiler</option>
                        </select>
                    </div>

                    <!-- Botón para aplicar filtros -->
                    <div class="flex items-end">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500">
                            Aplicar filtros
                        </button>
                    </div>
                </form>

                <!-- Grid de propiedades -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse($propiedades as $propiedad)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            @if(count($propiedad->fotos) > 0)
                            <img src="{{ asset('storage/' . $propiedad->fotos[0]->url_foto) }}" alt="{{ $propiedad->titulo }}" class="w-full h-48 object-cover">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Image" alt="Sin imagen" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $propiedad->titulo }}</h3>
                                <p class="text-gray-600">${{ number_format($propiedad->precio, 2) }}</p>
                                <span class="inline-block px-3 py-1 text-sm text-white {{ $propiedad->tipo_operacion === 'venta' ? 'bg-green-600' : 'bg-blue-600' }} rounded-full mt-2">
                                    {{ ucfirst($propiedad->tipo_operacion) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">No se encontraron propiedades con los filtros aplicados.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
