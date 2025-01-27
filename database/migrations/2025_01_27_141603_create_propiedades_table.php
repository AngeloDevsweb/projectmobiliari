<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vendedor')->constrained('vendedores')->onDelete('cascade'); // Relación con vendedores
            $table->string('titulo', 100);
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->string('ubicacion', 200);
            $table->decimal('latitud', 9, 6)->nullable();
            $table->decimal('longitud', 9, 6)->nullable();
            $table->enum('estado', ['disponible', 'vendida']);
            $table->enum('tipo_operacion', ['venta', 'alquiler']);
            $table->string('enlace_whatsapp', 255)->nullable();
            $table->timestamp('publicado_en')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
