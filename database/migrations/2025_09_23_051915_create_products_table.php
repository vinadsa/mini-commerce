<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 220)->unique();
            $table->text('description')->nullable();
            $table->string('sku', 64)->unique()->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('weight_grams')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('category_id', 'idx_products_category');
            $table->fullText(['name', 'description'], 'ft_products_name_description');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};