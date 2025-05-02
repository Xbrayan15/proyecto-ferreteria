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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete(); // Relación con el pedido
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relación con el usuario
            $table->foreignId('payment_method_id')->constrained()->cascadeOnDelete(); // Relación con el método de pago
            $table->decimal('total_amount', 10, 2); // Monto total de la factura
            $table->enum('status', ['pending', 'paid', 'cancelled']); // Estado de la factura
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
