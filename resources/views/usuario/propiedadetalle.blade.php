<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ $propiedad->titulo }}</h2>
        <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}</p>
        <p><strong>Estado:</strong> {{ $propiedad->estado }}</p>
        <p><strong>Tipo de Operación:</strong> {{ $propiedad->tipo_operacion }}</p>

        {{-- Nombre del vendedor --}}
        <div class="mt-4">
            <p><strong>Vendedor:</strong> {{ $propiedad->vendedor->nombre ?? 'No disponible' }}</p>
        </div>

        {{-- Carrusel de imágenes --}}
        @if($propiedad->fotos->isNotEmpty())
            <div class="relative w-full mt-4 overflow-hidden"> <!-- overflow-hidden para evitar el desbordamiento -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($propiedad->fotos as $foto)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $foto->url_foto) }}" alt="Imagen de la propiedad" class="w-full h-64 object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>
                    <!-- Controles del carrusel -->
                    <div class="swiper-button-next text-gray-600"></div>
                    <div class="swiper-button-prev text-gray-600"></div>
                </div>
            </div>
        @else
            <p class="mt-4">No hay fotos disponibles para esta propiedad.</p>
        @endif

        {{-- Mapa --}}
        <div id="map" class="w-full h-64 border rounded-lg mt-4"></div>

        <div class="mt-4">
            <p><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
            <p><strong>Latitud:</strong> <span id="latitud">{{ $propiedad->latitud }}</span></p>
            <p><strong>Longitud:</strong> <span id="longitud">{{ $propiedad->longitud }}</span></p>
                @php
                $yaEsFavorito = $propiedad->favoritos->where('id_usuario', auth()->id())->isNotEmpty();
                @endphp

                @if(!$yaEsFavorito)
                    <form id="favorito-form" method="POST" action="{{ route('favoritos.store') }}">
                        @csrf
                        <input type="hidden" name="id_propiedad" value="{{ $propiedad->id }}">
                        <button type="submit" id="favorito-btn" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                            Añadir a Favoritos
                        </button>
                    </form>
                @else
                    <p class="text-green-500">Esta propiedad ya está en tus favoritos.</p>
                @endif

        </div>
    </div>

    {{-- Leaflet.js --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- Swiper.js --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inicialización del mapa
            const location = [{{ $propiedad->latitud }}, {{ $propiedad->longitud }}];
            const map = L.map('map').setView(location, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker(location).addTo(map);

            // Inicialización de Swiper (carrusel de imágenes)
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1, // Muestra solo una imagen por vez
                spaceBetween: 10, // Espacio entre las imágenes
                loop: true, // Carrusel circular
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2, // Muestra 2 imágenes en pantallas pequeñas
                    },
                    768: {
                        slidesPerView: 3, // Muestra 3 imágenes en pantallas grandes
                    }
                }
            });

            // Estilizar las flechas de navegación
            const buttons = document.querySelectorAll('.swiper-button-next, .swiper-button-prev');
            buttons.forEach(button => {
                button.classList.add('bg-gray-500', 'text-white', 'rounded-full', 'p-2', 'opacity-70');
                button.style.fontSize = '18px'; // Tamaño más adecuado para las flechas
                button.addEventListener('mouseover', () => {
                    button.classList.add('opacity-100', 'bg-gray-700');
                });
                button.addEventListener('mouseout', () => {
                    button.classList.remove('opacity-100', 'bg-gray-700');
                });
            });
        });
    </script>
    <script>
        document.getElementById('favorito-form').addEventListener('submit', function (e) {
            e.preventDefault();
    
            const formData = new FormData(this);
    
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message); // Mostrar mensaje al usuario
                }
            })
            .catch(error => console.error(error));
        });
    </script>
</x-app-layout>
