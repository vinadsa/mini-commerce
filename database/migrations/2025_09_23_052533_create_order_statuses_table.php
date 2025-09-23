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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->tinyIncrements('id'); // tinyint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 50);
            $table->unsignedTinyInteger('sort_order')->default(0);
            
            // Unique constraint
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};