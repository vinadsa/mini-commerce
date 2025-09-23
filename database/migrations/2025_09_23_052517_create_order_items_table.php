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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('product_name', 200);
            $table->string('sku', 64)->nullable();
            $table->decimal('price', 12, 2);
            $table->unsignedSmallInteger('qty');
            $table->decimal('subtotal', 12, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            // Indexes
            $table->index('order_id');
            $table->index('product_id');

            // Foreign key constraints
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
                  
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};