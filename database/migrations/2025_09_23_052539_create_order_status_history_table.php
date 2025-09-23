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
        Schema::create('order_status_history', function (Blueprint $table) {
            $table->id(); // bigint unsigned NOT NULL AUTO_INCREMENT
            
            // Foreign key columns
            $table->unsignedBigInteger('order_id');
            $table->unsignedTinyInteger('from_status_id')->nullable();
            $table->unsignedTinyInteger('to_status_id');
            $table->unsignedInteger('changed_by')->nullable();
            
            // Additional columns
            $table->text('note')->nullable();
            
            // Timestamps - hanya created_at dengan default CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent();
            
            // Indexes
            $table->index('order_id');
            $table->index('from_status_id');
            $table->index('to_status_id');
            $table->index('changed_by');
            
            // Foreign key constraints
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
                  
            $table->foreign('from_status_id')
                  ->references('id')
                  ->on('order_statuses')
                  ->onDelete('set null');
                  
            $table->foreign('to_status_id')
                  ->references('id')
                  ->on('order_statuses')
                  ->onDelete('restrict');
                  
            $table->foreign('changed_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_status_history');
    }
};