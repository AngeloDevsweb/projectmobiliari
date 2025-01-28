<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    //
    public function dashboard()
    {
        return view('vendedor.dashboard'); // Vista para el dashboard del vendedor
    }

     // Mostrar las propiedades
     public function propiedades()
     {
         // Más adelante cargaremos las propiedades del vendedor
         return view('vendedores.propiedades');
     }
 
}
