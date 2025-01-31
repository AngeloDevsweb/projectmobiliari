<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
       // Verificar si el usuario está autenticado
       $notificaciones = null;

       if (Auth::check()) {
           // Obtener las notificaciones no leídas del usuario
           $notificaciones = Notificacion::where('id_usuario', Auth::id())
               ->where('leida', false)
               ->get();
       }

       // Pasar las notificaciones a la vista
       return view('layouts.navigation', compact('notificaciones'));
   
    }

    public function marcarComoLeidas()
    {
        // Marcar las notificaciones como leídas solo si existen
        $notificaciones = Notificacion::where('id_usuario', Auth::id())
            ->where('leida', false)
            ->update(['leida' => true]);

        if ($notificaciones) {
            return redirect()->back()->with('success', 'Notificaciones marcadas como leídas.');
        } else {
            return redirect()->back()->with('info', 'No hay notificaciones nuevas para marcar como leídas.');
        }
    }
}
