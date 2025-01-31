<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    //
    protected $fillable = ['id_usuario', 'mensaje', 'tipo_notificacion', 'leida', 'enviada_en'];

    // Relación con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
