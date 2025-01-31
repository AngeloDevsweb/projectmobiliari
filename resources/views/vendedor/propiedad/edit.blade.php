@extends('vendedor.layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow-xl">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Editar Propiedad</h2>
        <form action="{{ route('vendedor.propiedad.update', $propiedad->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="titulo" class="block text-lg font-medium text-gray-700">Título</label>
                <input type="text" value="{{$propiedad->titulo}}" name="titulo" id="titulo" 
                       class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="descripcion" class="block text-lg font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{$propiedad->descripcion}}</textarea>
            </div>

            <div class="mb-6">
                <label for="precio" class="block text-lg font-medium text-gray-700">Precio</label>
                <input type="number" value="{{$propiedad->precio}}" name="precio" id="precio" 
                       class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
            </div>

            <div class="mb-6">
                <label for="ubicacion" class="block text-lg font-medium text-gray-700">Ubicación</label>
                <input type="text" name="ubicacion" value="{{$propiedad->ubicacion}}" id="ubicacion" 
                       class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-lg font-medium text-gray-700">Ubicación en el Mapa</label>
                <div id="map" class="w-full h-64 mt-2 border border-gray-300 rounded-lg"></div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="latitud" class="block text-lg font-medium text-gray-700">Latitud</label>
                    <input type="text" name="latitud" id="latitud" placeholder="Selecciona tu ubicación nuevamente"
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                </div>

                <div>
                    <label for="longitud" class="block text-lg font-medium text-gray-700">Longitud</label>
                    <input type="text" name="longitud" id="longitud" placeholder="Selecciona tu ubicación nuevamente"
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                </div>
            </div>

            <div class="mb-6">
                <label for="estado" class="block text-lg font-medium text-gray-700">Estado</label>
                <select name="estado" id="estado" 
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="disponible">Disponible</option>
                    <option value="vendida">Vendida</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="tipo_operacion" class="block text-lg font-medium text-gray-700">Tipo de Operación</label>
                <select name="tipo_operacion" id="tipo_operacion" 
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="venta" {{$propiedad->tipo_operacion === 'venta' ? 'selected' : ''}}>Venta</option>
                    <option value="alquiler" {{$propiedad->tipo_operacion === 'alquiler' ? 'selected' : ''}}>Alquiler</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="enlace_whatsapp" class="block text-lg font-medium text-gray-700">Enlace de WhatsApp</label>
                <input type="text" value="{{$propiedad->enlace_whatsapp}}" name="enlace_whatsapp" id="enlace_whatsapp" 
                       class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">Guardar</button>
            </div>
        </form>
    </div>

    {{-- Leaflet.js (Mapa Interactivo) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const defaultLocation = [-17.786340248869184, -63.179901275354126]; // Coordenadas predeterminadas
            const map = L.map('map').setView(defaultLocation, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            let marker = L.marker(defaultLocation, { draggable: true }).addTo(map);

            marker.on('dragend', function (event) {
                const position = marker.getLatLng();
                document.getElementById("latitud").value = position.lat;
                document.getElementById("longitud").value = position.lng;
            });

            map.on('click', function (event) {
                marker.setLatLng(event.latlng);
                document.getElementById("latitud").value = event.latlng.lat;
                document.getElementById("longitud").value = event.latlng.lng;
            });
        });
    </script>
@endsection