<?php

namespace App\Observers;

use App\Models\Notificacion;
use App\Models\Propiedad;
use App\Models\User;

class PropiedadObserver
{
    /**
     * Handle the Propiedad "created" event.
     */
    public function created(Propiedad $propiedad): void
    {
        //
         // Obtener todos los usuarios
         $usuarios = User::all();

         foreach ($usuarios as $usuario) {
             Notificacion::create([
                 'id_usuario' => $usuario->id,
                 'mensaje' => "Se ha publicado una nueva propiedad: {$propiedad->titulo}",
                 'tipo_notificacion' => 'nueva_propiedad',
             ]);
         }
    }

    /**
     * Handle the Propiedad "updated" event.
     */
    public function updated(Propiedad $propiedad): void
    {
        //
    }

    /**
     * Handle the Propiedad "deleted" event.
     */
    public function deleted(Propiedad $propiedad): void
    {
        //
    }

    /**
     * Handle the Propiedad "restored" event.
     */
    public function restored(Propiedad $propiedad): void
    {
        //
    }

    /**
     * Handle the Propiedad "force deleted" event.
     */
    public function forceDeleted(Propiedad $propiedad): void
    {
        //
    }
}
