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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Código único del cupón
            $table->decimal('discount_amount', 10, 2); // Monto de descuento
            $table->enum('discount_type', ['percentage', 'fixed']); // Tipo de descuento (porcentaje o cantidad fija)
            $table->dateTime('valid_from'); // Fecha de inicio de validez
            $table->dateTime('valid_until'); // Fecha de caducidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
