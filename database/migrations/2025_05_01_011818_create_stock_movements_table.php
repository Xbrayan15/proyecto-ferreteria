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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); // Relación con productos
            $table->integer('quantity'); // Cantidad de producto movida (positiva para entrada, negativa para salida)
            $table->enum('movement_type', ['entrada', 'salida']); // Tipo de movimiento restringido a dos valores
            $table->text('description')->nullable(); // Descripción del movimiento (opcional)
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
