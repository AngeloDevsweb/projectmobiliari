@extends('vendedor.layout')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Bienvenido, {{ Auth::guard('vendedores')->user()->nombre }}</h2>
        <p class="text-gray-700">Aquí podrás gestionar tus propiedades y más.</p>
    </div>
</div>
@endsection
