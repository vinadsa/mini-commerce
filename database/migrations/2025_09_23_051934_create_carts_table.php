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
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // bigint unsigned primary key dengan auto increment
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('session_token', 128)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent(); // DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate(); // DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            
            // Unique constraints
            $table->unique('user_id', 'uniq_user_cart');
            $table->unique('session_token', 'uniq_session');
            
            // Index
            $table->index('user_id', 'idx_cart_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};