<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Título de la propiedad -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ $propiedad->titulo }}</h2>

        <!-- Descripción y detalles -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-lg text-gray-600"><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
                <p class="text-lg text-gray-600"><strong>Precio:</strong> <span class="text-green-600 font-bold">${{ number_format($propiedad->precio, 2) }}</span></p>
                <p class="text-lg text-gray-600 "><strong>Tipo:</strong> {{ $propiedad->tipo_operacion }}</p>
            </div>

            <div>
                <div class="flex items-center space-x-2">
                    <p class="text-lg text-gray-600 font-semibold">Estado:</p>
                    <span class="px-4 py-1 text-sm font-semibold text-white {{ $propiedad->estado === 'disponible' ? 'bg-green-600' : 'bg-indigo-600' }} rounded-full">
                        {{ ucfirst($propiedad->estado) }}
                    </span>
                </div>

                <p class="text-lg text-gray-600 mt-4"><strong>Vendedor:</strong> {{ $propiedad->vendedor->nombre ?? 'No disponible' }}</p>
            </div>
        </div>

        <!-- Carrusel de imágenes -->
        @if($propiedad->fotos->isNotEmpty())
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Galería de imágenes</h3>
                <div class="relative w-full overflow-hidden rounded-lg">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($propiedad->fotos as $foto)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $foto->url_foto) }}" alt="Imagen de la propiedad" class="w-full h-64 object-cover rounded-lg shadow-md">
                                </div>
                            @endforeach
                        </div>
                        <!-- Controles -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        @else
            <p class="mt-8 text-gray-500">No hay fotos disponibles para esta propiedad.</p>
        @endif

       <p class="text-sm text-gray-600 mt-4">Si deseas ver una foto panoramica en 3d de la propiedad puedes verlo aqui: <a href="https://angelodevsweb.github.io/templatepanoramicsphereviewer/"
         class="bg-indigo-700 p-2 rounded-lg text-white hover:bg-slate-400 transition-all" target="_blank">Vista Panoramica</a></p>

        <!-- Mapa -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Ubicación</h3>
            <div id="map" class="w-full h-64 border rounded-lg shadow-md"></div>
            <p class="mt-4 text-lg text-gray-600"><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
            <p class="text-lg text-gray-600"><strong>Latitud:</strong> <span id="latitud">{{ $propiedad->latitud }}</span></p>
            <p class="text-lg text-gray-600"><strong>Longitud:</strong> <span id="longitud">{{ $propiedad->longitud }}</span></p>
        </div>

        <!-- Botones de acciones -->
        <div class="mt-8 flex flex-col md:flex-row items-center gap-4">
            <a href="https://web.whatsapp.com/" target="_blank" class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg shadow-md text-center w-full md:w-auto">
                Contactar al vendedor<ion-icon class="text-2xl ml-1 " name="logo-whatsapp"></ion-icon>
            </a>

            @php
                $yaEsFavorito = $propiedad->favoritos->where('id_usuario', auth()->id())->isNotEmpty();
            @endphp

            @if(!$yaEsFavorito)
                <form id="favorito-form" method="POST" action="{{ route('favoritos.store') }}" class="w-full md:w-auto">
                    @csrf
                    <input type="hidden" name="id_propiedad" value="{{ $propiedad->id }}">
                    <button type="submit" id="favorito-btn" class="bg-indigo-800 hover:bg-indigo-900 text-white py-2 px-6 rounded-lg shadow-md w-full md:w-auto">
                        <ion-icon name="bookmark"></ion-icon>Añadir a Favoritos
                    </button>
                </form>
            @else
                <p class="text-green-500 font-semibold text-center md:text-left">Esta propiedad ya está en tus favoritos.</p>
            @endif
        </div>
    </div>

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inicializar mapa
            const location = [{{ $propiedad->latitud }}, {{ $propiedad->longitud }}];
            const map = L.map('map').setView(location, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker(location).addTo(map);

            // Inicializar Swiper
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                },
            });

            // Inicializar Photo Sphere Viewer
            const viewer = new Viewer({
                container: document.querySelector('#viewer'),
                panorama: '{{ asset('images/panoramic.jpg') }}',

            });
            
        });
    </script>

</x-app-layout>
