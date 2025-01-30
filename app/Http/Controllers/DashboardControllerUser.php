<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class DashboardControllerUser extends Controller
{
    //
    public function index()
    {
        // Obtener todas las propiedades con las imágenes relacionadas
        $propiedades = Propiedad::with('fotos')->get();
        //dd($propiedades->toArray()); // Verifica los datos cargados
        // Pasar las propiedades a la vista
        return view('dashboard', compact('propiedades'));
    }
}
