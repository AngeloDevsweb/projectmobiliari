<?php

namespace App\Http\Controllers\Vendedor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    //
   
    public function showRegisterForm()
    {
        // Cambiar ruta de la vista
        return view('vendedor.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:vendedores',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_vendedor' => 'required|in:dueño de propiedad,vendedor externo',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        Vendedor::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_vendedor' => $request->tipo_vendedor,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        ]);

        return redirect()->route('vendedor.login')->with('success', 'Registro exitoso. Por favor inicia sesión.');
    }
}
