<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    //
    protected $table = 'propiedades';
    protected $fillable = [
        'id_vendedor',
        'titulo',
        'descripcion',
        'precio',
        'ubicacion',
        'latitud',
        'longitud',
        'estado',
        'tipo_operacion',
        'enlace_whatsapp',
        'publicado_en',
    ];

    // Relación con Vendedor
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }

    // Relación con FotosPropiedades
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'id_propiedad');
    }
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_propiedad');
    }
}
