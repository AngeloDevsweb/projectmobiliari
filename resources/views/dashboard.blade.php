<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propiedades inmobiliarias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Grid de tarjetas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- Tarjeta 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/16972967/pexels-photo-16972967/free-photo-of-carretera-casas-calle-edificios.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Casa moderna" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Casa Moderna</h3>
                                <p class="text-gray-600">$200,000</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-green-600 rounded-full mt-2">En venta</span>
                            </div>
                        </div>
                        <!-- Tarjeta 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/16977285/pexels-photo-16977285/free-photo-of-calle-urbano-paisaje-urbano-arquitectura-moderna.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Departamento en la ciudad" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Departamento en la ciudad</h3>
                                <p class="text-gray-600">$1,200 / mes</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded-full mt-2">Alquiler</span>
                            </div>
                        </div>
                        <!-- Tarjeta 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/17394427/pexels-photo-17394427/free-photo-of-casas-calle-edificios-blanco.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Villa de lujo" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Villa de lujo</h3>
                                <p class="text-gray-600">$500,000</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-green-600 rounded-full mt-2">En venta</span>
                            </div>
                        </div>
                        <!-- Tarjeta 4 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/29055377/pexels-photo-29055377.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Casa rural" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Casa rural</h3>
                                <p class="text-gray-600">$800 / mes</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded-full mt-2">Alquiler</span>
                            </div>
                        </div>
                        <!-- Tarjeta 5 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/28456459/pexels-photo-28456459/free-photo-of-espacio-de-vida-abierto-contemporaneo-con-diseno-moderno.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Cabaña en las montañas" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Cabaña en las montañas</h3>
                                <p class="text-gray-600">$150,000</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-green-600 rounded-full mt-2">En venta</span>
                            </div>
                        </div>
                        <!-- Tarjeta 6 -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Apartamento amueblado" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">Apartamento amueblado</h3>
                                <p class="text-gray-600">$950 / mes</p>
                                <span class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded-full mt-2">Alquiler</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
