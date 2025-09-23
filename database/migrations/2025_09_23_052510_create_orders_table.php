<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 40)->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('status_id')->default(1)->constrained('order_statuses')->restrictOnDelete();
            $table->decimal('total', 12, 2);
            $table->unsignedInteger('total_items')->default(0);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->string('payment_method', 50)->nullable();
            $table->text('shipping_address_text')->nullable();
            $table->text('billing_address_text')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            
            // Indexes untuk performa
            $table->index('status_id');
            $table->index(['user_id', 'created_at'], 'idx_orders_user_created');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};