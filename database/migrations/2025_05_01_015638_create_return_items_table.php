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
        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_id')->constrained()->cascadeOnDelete(); // Relación con la devolución
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); // Relación con el producto
            $table->integer('quantity'); // Cantidad de productos devueltos
            $table->text('reason')->nullable(); // Razón de la devolución
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_items');
    }
};
