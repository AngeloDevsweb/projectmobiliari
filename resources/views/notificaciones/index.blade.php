<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900">Notificaciones</h2>

        @foreach ($notificaciones as $notificacion)
            <div class="bg-white shadow-sm rounded-lg p-4 mb-4">
                <p>{{ $notificacion->mensaje }}</p>
                <p class="text-sm text-gray-500">{{ $notificacion->created_at->diffForHumans() }}</p>
            </div>
        @endforeach

        <form action="{{ route('notificaciones.leidas') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Marcar todas como leídas
            </button>
        </form>
    </div>
</x-app-layout>