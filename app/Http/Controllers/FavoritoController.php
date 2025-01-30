<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $favoritos = Favorito::where('id_usuario', $userId)
            ->with('propiedad')
            ->get();

        return view('favoritos.index', compact('favoritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $userId = Auth::id();
        $propiedadId = $request->input('id_propiedad');

        // Verificar si ya está marcado como favorito
        $favoritoExistente = Favorito::where('id_usuario', $userId)
            ->where('id_propiedad', $propiedadId)
            ->first();

        if ($favoritoExistente) {
            return response()->json(['message' => 'Esta propiedad ya está en tus favoritos.'], 400);
        }

        // Añadir a favoritos
        Favorito::create([
            'id_usuario' => $userId,
            'id_propiedad' => $propiedadId,
        ]);

        return response()->json(['message' => 'Propiedad añadida a favoritos.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}
