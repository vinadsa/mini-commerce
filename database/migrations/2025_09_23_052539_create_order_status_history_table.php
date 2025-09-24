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
            $table->id();
            
            // Foreign key columns dengan foreignId() dan method modern
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete();
                  
            $table->foreignId('from_status_id')
                  ->nullable()
                  ->constrained('order_statuses')
                  ->nullOnDelete();
                  
            $table->foreignId('to_status_id')
                  ->constrained('order_statuses')
                  ->restrictOnDelete();
                  
            $table->foreignId('changed_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            
            // Additional columns
            $table->text('note')->nullable();
            
            // Timestamps - hanya created_at dengan default CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent();
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