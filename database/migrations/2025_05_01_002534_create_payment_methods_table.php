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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id(); // Identificador único del método de pago
            $table->string('name'); // Nombre del método de pago (Ej: tarjeta, PayPal)
            $table->unsignedBigInteger('user_id'); // Relación con el usuario
            $table->timestamps(); // Tiempos de creación y actualización

            // Relación con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminar la clave foránea
        });

        Schema::dropIfExists('payment_methods');
    }
};

