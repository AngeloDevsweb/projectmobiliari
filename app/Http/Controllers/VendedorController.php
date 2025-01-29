<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    //
    public function dashboard()
    {
        // Recuperamos las propiedades del vendedor actual
        $propiedades = Propiedad::where('id_vendedor', Auth::guard('vendedores')->id())->get();
        
        // Pasamos las propiedades a la vista del dashboard
        return view('vendedor.dashboard', compact('propiedades'));
    }

    // Mostrar formulario de creación de propiedad
    public function crearPropiedad()
    {
        return view('vendedor.propiedad.create');
    }

    // Guardar propiedad en la base de datos
    public function guardarPropiedad(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'ubicacion' => 'required|string|max:200',
            'estado' => 'required|in:disponible,vendida',
            'tipo_operacion' => 'required|in:venta,alquiler',
        ]);

        Propiedad::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'ubicacion' => $request->ubicacion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'estado' => $request->estado,
            'tipo_operacion' => $request->tipo_operacion,
            'id_vendedor' => Auth::guard('vendedores')->id(),
        ]);

    

        return redirect()->route('vendedor.dashboard')->with('success', 'Propiedad registrada con éxito');
    }

    //Mostrar formulario de edición de propiedad
    public function editarPropiedad($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        return view('vendedor.propiedad.edit', compact('propiedad'));
    }

    // Actualizar propiedad en la base de datos
    public function actualizarPropiedad(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'ubicacion' => 'required|string|max:200',
            'estado' => 'required|in:disponible,vendida',
            'tipo_operacion' => 'required|in:venta,alquiler',
        ]);

        $propiedad = Propiedad::findOrFail($id);
        $propiedad->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'ubicacion' => $request->ubicacion,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'estado' => $request->estado,
            'tipo_operacion' => $request->tipo_operacion,
        ]);

        return redirect()->route('vendedor.dashboard')->with('success', 'Propiedad actualizada con éxito');
    }

    // Eliminar propiedad
    public function eliminarPropiedad($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        $propiedad->delete();

        return redirect()->route('vendedor.dashboard')->with('success', 'Propiedad eliminada con éxito');
    }
 
}
