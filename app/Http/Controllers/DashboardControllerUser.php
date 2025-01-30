<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class DashboardControllerUser extends Controller
{
    //
    public function index(Request $request)
    {
        // Obtener todas las propiedades con las imágenes relacionadas
        //$propiedades = Propiedad::with('fotos')->get();
        //dd($propiedades->toArray()); // Verifica los datos cargados
        // Pasar las propiedades a la vista
        // Inicializamos la consulta
        $query = Propiedad::with('fotos');

        // Aplicamos filtros si existen
        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->input('precio_min'));
        }
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->input('precio_max'));
        }
        if ($request->filled('tipo_operacion')) {
            $query->where('tipo_operacion', $request->input('tipo_operacion'));
        }

        // Obtenemos las propiedades filtradas
        $propiedades = $query->get();
        //dd($propiedades);
        //dd($propiedades->toArray());
        // Pasamos las propiedades y los filtros activos a la vista
        return view('dashboard', [
            'propiedades' => $propiedades,
            'filtros' => $request->only(['precio_min', 'precio_max', 'tipo_operacion'])
        ]);
    }

    public function detalle($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        return view('usuario.propiedadetalle', compact('propiedad'));
    }
}
