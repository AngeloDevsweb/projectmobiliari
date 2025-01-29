<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoPropiedadController extends Controller
{
    //
     // Mostrar formulario y fotos
     public function index()
     {
        $vendedorId = Auth::guard('vendedores')->id();

        // Obtener solo las propiedades del vendedor actual
        $propiedades = Propiedad::where('id_vendedor', $vendedorId)->get();

        // Obtener fotos solo de las propiedades del vendedor actual
        $fotos = Foto::whereHas('propiedad', function ($query) use ($vendedorId) {
            $query->where('id_vendedor', $vendedorId);
        })->with('propiedad')->get();

        return view('fotos.index', compact('propiedades', 'fotos'));
     }
 
     // Subir fotos
     public function store(Request $request)
     {
        $request->validate([
            'id_propiedad' => 'required|exists:propiedades,id',
            'fotos.*' => 'required|image|max:2048', // Cada archivo debe ser una imagen de máximo 2MB
        ]);
    
        // Verificar que la propiedad pertenece al vendedor actual
        $propiedad = Propiedad::where('id', $request->id_propiedad)
                              ->where('id_vendedor', Auth::guard('vendedores')->id())
                              ->first();
    
        if (!$propiedad) {
            return back()->withErrors(['id_propiedad' => 'La propiedad seleccionada no pertenece a usted.']);
        }
    
        foreach ($request->file('fotos') as $foto) {
            $path = $foto->store('fotos', 'public'); // Guardar en storage/app/public/fotos
    
            Foto::create([
                'id_propiedad' => $request->id_propiedad,
                'url_foto' => $path,
            ]);
        }
    
        return back()->with('success', 'Fotos subidas exitosamente.');
     }
 
     // Eliminar fotos
     public function destroy($id)
     {
         $foto = Foto::findOrFail($id);
 
         // Eliminar archivo del almacenamiento
         Storage::disk('public')->delete($foto->url_foto);
 
         // Eliminar registro de la base de datos
         $foto->delete();
 
         return back()->with('success', 'Foto eliminada correctamente.');
     }
}
