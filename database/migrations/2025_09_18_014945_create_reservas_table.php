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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('destino_id')->constrained()->onDelete('cascade');
            $table->date('fecha_reserva');
            $table->integer('numero_personas');
            $table->decimal('precio_total', 8, 2);// 8 digitos en total, 2 decimales, por agregar en vista
            $table->string('estado')->default('pendiente'); //pendiente, confirmada, cancelada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
