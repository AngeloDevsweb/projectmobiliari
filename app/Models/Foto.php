<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = 'fotos_propiedades';
    protected $fillable = [
        'id_propiedad',
        'url_foto',
    ];

    // Relación con Propiedad
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'id_propiedad');
    }
}
