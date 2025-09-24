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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // bigint unsigned primary key dengan auto increment
            
            // cart_id: bigInteger - gunakan foreignId()
            $table->foreignId('cart_id')
                  ->constrained('carts')
                  ->cascadeOnDelete();
            
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            
            $table->unsignedSmallInteger('qty')->default(1);
            $table->decimal('price', 12, 2);
            $table->timestamps(); // Otomatis created_at & updated_at dengan behavior yang benar
            
            // Unique constraint untuk cart_id dan product_id
            $table->unique(['cart_id', 'product_id'], 'uniq_cart_product');

            // Index untuk product_id (cart_id sudah auto-index dari foreignId)
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};