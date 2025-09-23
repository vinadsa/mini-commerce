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
            $table->unsignedBigInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->unsignedSmallInteger('qty')->default(1);
            $table->decimal('price', 12, 2);
            $table->timestamp('added_at')->useCurrent();
            
            // Unique constraint untuk cart_id dan product_id
            $table->unique(['cart_id', 'product_id'], 'uniq_cart_product');
            
            // Index
            $table->index('product_id');
            
            // Foreign key constraints
            $table->foreign('cart_id')
                  ->references('id')
                  ->on('carts')
                  ->onDelete('cascade');
                  
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('restrict');
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