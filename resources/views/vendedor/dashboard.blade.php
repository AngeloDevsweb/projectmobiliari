@extends('vendedor.layout')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Bienvenido, {{ Auth::guard('vendedores')->user()->nombre }}</h2>
        <p class="text-gray-700">Aquí podrás gestionar tus propiedades.</p>

        <div class="mt-6">
            <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Propiedad</a>
        </div>

        <div class="mt-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Ubicación</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($propiedades as $propiedad)
                        <tr>
                            <td class="px-4 py-2">{{ $propiedad->titulo }}</td>
                            <td class="px-4 py-2">{{ $propiedad->ubicacion }}</td>
                            <td class="px-4 py-2">{{ $propiedad->precio }}</td>
                            <td class="px-4 py-2">{{ $propiedad->estado }}</td>
                            <td class="px-4 py-2">
                                <a href="" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                            </td>
                            <td>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
