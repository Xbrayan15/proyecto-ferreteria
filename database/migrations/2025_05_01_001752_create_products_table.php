<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->string('sku')->unique();
        $table->decimal('precio', 10, 2);
        $table->string('imagen')->nullable();
        $table->integer('stock'); // Aquí simplemente agregamos el campo stock como un integer
        // Eliminamos el campo stock_id y la relación con stocks
        $table->unsignedBigInteger('category_id')->nullable();
        $table->unsignedBigInteger('subcategory_id')->nullable();
        $table->unsignedBigInteger('brand_id')->nullable();
        $table->unsignedBigInteger('tax_id')->nullable();
        $table->timestamps();


        // Definimos las claves foráneas para las otras relaciones (category, subcategory, brand, tax)
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
        $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('set null');
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
