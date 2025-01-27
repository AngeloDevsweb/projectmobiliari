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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')
              ->constrained('users')
              ->onDelete('cascade');
                $table->text('mensaje');
                $table->enum('tipo_notificacion', ['nueva_propiedad', 'cambio_favorito']);
                $table->boolean('leida')->default(false);
                $table->timestamp('enviada_en')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
