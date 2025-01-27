<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendedor extends Authenticatable 
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'vendedores'; // Nombre de la tabla correcta en singular o plural según esté en tu base de datos

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tipo_vendedor',
        'facebook',
        'instagram',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
