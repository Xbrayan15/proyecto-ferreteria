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
    {Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->text('descripcion')->nullable();
        $table->string('sku', 100)->unique();
        $table->decimal('precio', 10, 2);
        $table->integer('stock')->default(0);
    
        $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('stock_id')->nullable()->constrained('stocks')->nullOnDelete();
        $table->foreignId('tax_id')->nullable()->constrained('taxes')->nullOnDelete();
    
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
