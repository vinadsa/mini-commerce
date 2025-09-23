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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // unsigned int AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 120); // varchar(120) NOT NULL
            $table->string('slug', 140)->unique(); // varchar(140) NOT NULL dengan UNIQUE KEY
            $table->text('description')->nullable(); // text DEFAULT NULL
            $table->timestamp('created_at')->nullable()->useCurrent(); // DEFAULT CURRENT_TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};