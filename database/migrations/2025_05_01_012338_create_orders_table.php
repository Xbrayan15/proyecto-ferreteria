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
    { Schema::create('orders', function (Blueprint $table) {
        $table->id(); // Identificador único del pedido

        $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relación con el usuario
        $table->foreignId('address_id')->constrained()->cascadeOnDelete(); // Relación con la dirección de envío
        $table->foreignId('coupon_id')->nullable()->constrained()->nullOnDelete(); // Relación con un cupón (si aplica)
        $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete(); // ✅ CORREGIDO
        $table->decimal('total_amount', 10, 2); // Monto total del pedido
        $table->enum('status', ['pending', 'processing', 'completed', 'cancelled']); // Estado del pedido
        $table->timestamps(); // Tiempos de creación y actualización
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
