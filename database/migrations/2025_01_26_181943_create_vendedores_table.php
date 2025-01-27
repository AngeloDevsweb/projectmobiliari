<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id(); //id del vendedor primery key
            $table->string('nombre', 100); // Nombre del vendedor
            $table->string('email', 100)->unique(); // Correo electrónico único
            $table->string('password'); // Contraseña encriptada
            $table->enum('tipo_vendedor', ['dueño de propiedad', 'vendedor externo']); // Tipo de vendedor
            $table->string('facebook')->nullable(); // Facebook (opcional)
            $table->string('instagram')->nullable(); // Instagram (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
