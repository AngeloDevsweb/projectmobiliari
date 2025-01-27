<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendedor; // Asegúrate de que el modelo Vendedor esté creado
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
     // Mostrar el formulario de login
     public function showLoginForm()
     {
         return view('vendedor.auth.login');
     }
 
     // Manejar el login
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);
 
         if (Auth::guard('vendedor')->attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->route('vendedor.dashboard');
         }
 
         return back()->withErrors([
             'email' => 'Las credenciales no coinciden con nuestros registros.',
         ])->onlyInput('email');
     }
 
     // Mostrar el formulario de registro
     public function showRegisterForm()
     {
         return view('vendedor.auth.register');
     }
 
     // Manejar el registro
     public function register(Request $request)
     {
         $data = $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'email', 'unique:vendedores,email'],
             'password' => ['required', 'confirmed', 'min:8'],
         ]);
 
         $vendedor = Vendedor::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
         ]);
 
         Auth::guard('vendedor')->login($vendedor);
 
         return redirect()->route('vendedor.dashboard');
     }
 
     // Manejar el logout
     public function logout(Request $request)
     {
         Auth::guard('vendedor')->logout();
 
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return redirect()->route('vendedor.login');
     }
}
