@extends('vendedor.layout')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Bienvenido, {{ Auth::guard('vendedores')->user()->nombre }}</h2>
        <p class="text-gray-700">Aquí podrás gestionar tus propiedades.</p>

        <div class="mt-6">
            <a href="{{ route('vendedor.propiedad.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Propiedad</a>
        </div>

        <div class="mt-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Ubicación</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($propiedades as $propiedad)
                        <tr>
                            <td class="px-4 py-2">{{ $propiedad->titulo }}</td>
                            <td class="px-4 py-2">{{ $propiedad->ubicacion }}</td>
                            <td class="px-4 py-2">{{ $propiedad->precio }}</td>
                            <td class="px-4 py-2">{{ $propiedad->estado }}</td>
                            <td class="px-4 py-2">{{ $propiedad->tipo_operacion }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('vendedor.propiedad.edit', $propiedad->id) }}" 
                                    class="text-white hover:text-slate-500 p-3 rounded-lg shadow-md bg-fuchsia-900">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('vendedor.propiedad.destroy', $propiedad->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button bg-red-800 p-3 rounded-lg shadow-md hover:bg-slate-600
                                     text-white transition-all">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center py-4" colspan="6">No tienes propiedades guardadas</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script para la ventana de confirmación -->
<script>
    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente
            const confirmation = confirm('¿Estás seguro de que deseas eliminar esta propiedad?');
            if (confirmation) {
                this.closest('.delete-form').submit(); // Envía el formulario asociado al botón
            }
        });
    });
</script>
@endsection