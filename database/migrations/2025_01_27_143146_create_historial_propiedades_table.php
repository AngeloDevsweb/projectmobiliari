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
        Schema::create('historial_propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_propiedad')
              ->constrained('propiedades')
              ->onDelete('cascade');
            $table->text('descripcion_anterior')->nullable();
            $table->decimal('precio_anterior', 10, 2)->nullable();
            $table->timestamp('fecha_cambio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_propiedades');
    }
};
