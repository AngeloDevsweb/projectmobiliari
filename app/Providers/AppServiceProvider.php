<?php

namespace App\Providers;

use App\Models\Propiedad;
use App\Observers\PropiedadObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Observador de Propiedad
        Propiedad::observe(PropiedadObserver::class);

        // Solo compartir las notificaciones si el usuario está autenticado
        if (Auth::check()) {
            // Aquí asumimos que el modelo de notificación se llama Notificacion
            $notificaciones = Notificacion::where('id_usuario', Auth::id())
                ->where('leida', false)
                ->get();
            view()->share('notificaciones', $notificaciones);
        }
    }
}
