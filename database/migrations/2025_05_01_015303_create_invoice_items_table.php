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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete(); // Relación con la factura
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); // Relación con el producto
            $table->integer('quantity'); // Cantidad de producto en la factura
            $table->decimal('price', 10, 2); // Precio del producto en el momento de la factura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
