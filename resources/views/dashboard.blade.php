<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propiedades inmobiliarias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Grid de tarjetas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($propiedades as $propiedad)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                                <!-- Mostrar la primera imagen de la propiedad -->
                                @if(count($propiedad->fotos) > 0)
                                    <img src="{{ asset('storage/' . $propiedad->fotos[0]->url_foto) }}" alt="{{ $propiedad->titulo }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Image" alt="Sin imagen" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $propiedad->titulo }}</h3>
                                    <p class="text-gray-600">${{ number_format($propiedad->precio, 2) }} $</p>
                                    <span class="inline-block px-3 py-1 text-sm text-white {{ $propiedad->tipo_operacion === 'venta' ? 'bg-green-600' : 'bg-blue-600' }} rounded-full mt-2">
                                        {{ ucfirst($propiedad->tipo_operacion) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
