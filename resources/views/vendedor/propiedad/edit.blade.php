@extends('vendedor.layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-zinc-200 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Editar Propiedad</h2>
        <form action="{{ route('vendedor.propiedad.update', $propiedad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-bold">Título</label>
                <input type="text" value="{{$propiedad->titulo}}" name="titulo" id="titulo" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-bold">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full p-2 border rounded-lg" rows="4" required>{{$propiedad->descripcion}}</textarea>
            </div>

            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-bold">Precio</label>
                <input type="number" value="{{$propiedad->precio}}" name="precio" id="precio" class="w-full p-2 border rounded-lg" step="0.01" required>
            </div>

            <div class="mb-4">
                <label for="ubicacion" class="block text-gray-700 font-bold">Ubicación</label>
                <input type="text" name="ubicacion" value="{{$propiedad->ubicacion}}" id="ubicacion" class="w-full p-2 border rounded-lg" required>
            </div>

            {{-- 📌 Sección del Mapa con Leaflet.js --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Ubicación en el Mapa</label>
                <div id="map" class="w-full h-64 border rounded-lg"></div>
            </div>

            <div class="mb-4">
                <label for="latitud" class="block text-gray-700 font-bold">Latitud</label>
                <input type="text"  name="latitud" placeholder="selecciona tu ubicacion nuevamente" id="latitud" class="w-full p-2 border rounded-lg" readonly>
            </div>

            <div class="mb-4">
                <label for="longitud" class="block text-gray-700 font-bold">Longitud</label>
                <input type="text"  name="longitud" placeholder="selecciona tu ubicacion nuevamente" id="longitud" class="w-full p-2 border rounded-lg" readonly>
            </div>

            <div class="mb-4">
                <label for="estado" class="block text-gray-700 font-bold">Estado</label>
                <select name="estado" id="estado" class="w-full p-2 border rounded-lg" required>
                    <option value="disponible">Disponible</option>
                    <option value="vendida">Vendida</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="tipo_operacion" class="block text-gray-700 font-bold">Tipo de Operación</label>
                <select name="tipo_operacion" id="tipo_operacion" class="w-full p-2 border rounded-lg" required>
                    <option value="venta" {{$propiedad->tipo_operacion === 'venta' ? 'selected' :''}}>Venta</option>
                    <option value="alquiler" {{$propiedad->tipo_operacion === 'alquiler' ? 'selected' : ''}}>Alquiler</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="enlace_whatsapp" class="block text-gray-700 font-bold">Enlace de WhatsApp</label>
                <input type="text" value="enlace_whatsapp" name="enlace_whatsapp" id="enlace_whatsapp" class="w-full p-2 border rounded-lg">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>

    {{-- 📌 Leaflet.js (Gratis y sin API Key) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const defaultLocation = [-17.786340248869184, -63.179901275354126]; // santa cruz por defecto
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
