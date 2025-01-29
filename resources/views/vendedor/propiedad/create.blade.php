@extends('vendedor.layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Crear Propiedad</h2>
        <form action="{{ route('vendedor.propiedad.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-bold">Título</label>
                <input type="text" name="titulo" id="titulo" class="w-full p-2 border rounded-lg" required>
            </div>
            
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-bold">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full p-2 border rounded-lg" rows="4" required></textarea>
            </div>
            
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-bold">Precio</label>
                <input type="number" name="precio" id="precio" class="w-full p-2 border rounded-lg" step="0.01" required>
            </div>
            
            <div class="mb-4">
                <label for="ubicacion" class="block text-gray-700 font-bold">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="w-full p-2 border rounded-lg" required>
            </div>
            
            <div class="mb-4">
                <label for="latitud" class="block text-gray-700 font-bold">Latitud</label>
                <input type="text" name="latitud" id="latitud" class="w-full p-2 border rounded-lg">
            </div>
            
            <div class="mb-4">
                <label for="longitud" class="block text-gray-700 font-bold">Longitud</label>
                <input type="text" name="longitud" id="longitud" class="w-full p-2 border rounded-lg">
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
                    <option value="venta">Venta</option>
                    <option value="alquiler">Alquiler</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="enlace_whatsapp" class="block text-gray-700 font-bold">Enlace de WhatsApp</label>
                <input type="text" name="enlace_whatsapp" id="enlace_whatsapp" class="w-full p-2 border rounded-lg">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
@endsection
