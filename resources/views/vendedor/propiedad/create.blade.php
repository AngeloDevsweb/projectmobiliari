@extends('vendedor.layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-extrabold mb-6 text-gray-800">Crear Propiedad</h2>
        <form action="{{ route('vendedor.propiedad.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="titulo" class="block text-lg font-medium text-gray-700">Título</label>
                <input type="text"placeholder="Ingresa el titulo de tu propiedad" name="titulo" id="titulo" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
            </div>

            <div>
                <label for="descripcion" class="block text-lg font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" rows="4" required>
                
                </textarea>
            </div>

            <div>
                <label for="precio" class="block text-lg font-medium text-gray-700">Precio</label>
                <input type="number" placeholder="1500.50 $" name="precio" id="precio" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" step="0.01" required>
            </div>

            <div>
                <label for="ubicacion" class="block text-lg font-medium text-gray-700">Ubicación</label>
                <input type="text" placeholder="Av. los loros barrio las pailitas #33" name="ubicacion" id="ubicacion" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
            </div>

            {{-- 📌 Sección del Mapa con Leaflet.js --}}
            <div>
                <label class="block text-lg font-medium text-gray-700">Ubicación en el Mapa</label>
                <div id="map" class="w-full h-64 border border-gray-300 rounded-lg"></div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="latitud" class="block text-lg font-medium text-gray-700">Latitud</label>
                    <input type="text" name="latitud" id="latitud" class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-100 shadow-sm" readonly>
                </div>

                <div>
                    <label for="longitud" class="block text-lg font-medium text-gray-700">Longitud</label>
                    <input type="text" name="longitud" id="longitud" class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-100 shadow-sm" readonly>
                </div>
            </div>

            <div>
                <label for="estado" class="block text-lg font-medium text-gray-700">Estado</label>
                <select name="estado" id="estado" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                    <option value="disponible">Disponible</option>
                    <option value="vendida">Vendida</option>
                </select>
            </div>

            <div>
                <label for="tipo_operacion" class="block text-lg font-medium text-gray-700">Tipo de Operación</label>
                <select name="tipo_operacion" id="tipo_operacion" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                    <option value="venta">Venta</option>
                    <option value="alquiler">Alquiler</option>
                </select>
            </div>

            <div>
                <label for="enlace_whatsapp" class="block text-lg font-medium text-gray-700">Enlace de WhatsApp</label>
                <input type="text" placeholder="ingresa el enlace de tu whatsapp" name="enlace_whatsapp" id="enlace_whatsapp" class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">Guardar</button>
            </div>
        </form>
    </div>

    {{-- 📌 Leaflet.js (Gratis y sin API Key) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const defaultLocation = [-17.786340248869184, -63.179901275354126]; // Santa Cruz por defecto
            const map = L.map('map').setView(defaultLocation, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            let marker = L.marker(defaultLocation, { draggable: true }).addTo(map);

            // Actualizar los inputs cuando el usuario mueva el marcador
            marker.on('dragend', function (event) {
                const position = marker.getLatLng();
                document.getElementById("latitud").value = position.lat;
                document.getElementById("longitud").value = position.lng;
            });

            // Permitir al usuario hacer clic en el mapa para cambiar el marcador
            map.on('click', function (event) {
                marker.setLatLng(event.latlng);
                document.getElementById("latitud").value = event.latlng.lat;
                document.getElementById("longitud").value = event.latlng.lng;
            });
        });
    </script>
@endsection
