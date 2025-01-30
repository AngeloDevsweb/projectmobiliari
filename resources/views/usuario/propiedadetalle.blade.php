<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ $propiedad->titulo }}</h2>
        <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $propiedad->precio }}</p>
        <p><strong>Estado:</strong> {{ $propiedad->estado }}</p>
        <p><strong>Tipo de Operación:</strong> {{ $propiedad->tipo_operacion }}</p>

        {{-- Mapa con Leaflet.js --}}
        <div id="map" class="w-full h-64 border rounded-lg"></div>

        <div class="mt-4">
            <p><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
            <p><strong>Latitud:</strong> <span id="latitud">{{ $propiedad->latitud }}</span></p>
            <p><strong>Longitud:</strong> <span id="longitud">{{ $propiedad->longitud }}</span></p>
        </div>
    </div>

    {{-- Leaflet.js --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const location = [{{ $propiedad->latitud }}, {{ $propiedad->longitud }}];
            const map = L.map('map').setView(location, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker(location).addTo(map);
        });
    </script>
</x-app-layout>