<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Mis Favoritos</h2>

        @if($favoritos->isEmpty())
            <p class="text-gray-600 text-center">No tienes propiedades en tus favoritos.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favoritos as $favorito)
                    @php
                        $propiedad = $favorito->propiedad;
                        $primeraFoto = $propiedad->fotos->first();
                        $imagenUrl = $primeraFoto ? asset('storage/' . $primeraFoto->url_foto) : 'https://via.placeholder.com/400x300?text=Sin+Imagen';
                    @endphp
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Imagen de la propiedad -->
                        <img src="{{ $imagenUrl }}" alt="Imagen de {{ $propiedad->titulo }}" class="w-full h-48 object-cover">
                        
                        <!-- Detalles de la propiedad -->
                        <div class="p-4">
                            <h3 class="text-lg font-bold">{{ $propiedad->titulo }}</h3>
                            {{-- <p class="text-gray-600 text-sm mb-2">{{ Str::limit($propiedad->descripcion, 100, '...') }}</p> --}}
                            <p class="font-semibold text-gray-800 mb-2">Precio: ${{ number_format($propiedad->precio, 2) }}</p>
                            <span class="inline-block px-3 py-1 text-sm text-white {{ $propiedad->tipo_operacion === 'venta' ? 'bg-green-600' : 'bg-blue-600' }} rounded-full">
                                {{ ucfirst($propiedad->tipo_operacion) }}
                            </span>

                            <!-- Botón para ver detalles -->
                            <a href="{{ route('usuario.propiedad.detalle', $propiedad->id) }}" 
                               class="block bg-blue-500 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-600 transition mt-3">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
