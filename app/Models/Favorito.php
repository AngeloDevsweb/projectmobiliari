<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_propiedad',
    ];

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación con Propiedad
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'id_propiedad');
    }
}
