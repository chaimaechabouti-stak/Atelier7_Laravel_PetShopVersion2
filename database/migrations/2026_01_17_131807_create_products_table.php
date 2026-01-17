<?php
// database/migrations/xxxx_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->decimal('compare_price', 8, 2)->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('animal_type'); // Chien, Chat, Rongeur, etc.
            $table->string('brand')->nullable();
            $table->string('weight');
            $table->integer('stock')->default(0);
            $table->string('sku')->unique()->nullable();
            $table->float('rating')->default(0);
            $table->integer('review_count')->default(0);
            $table->string('image_url');
            $table->json('images')->nullable(); // Pour plusieurs images
            $table->text('features')->nullable(); // JSON ou texte
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            // Index pour les performances
            $table->index('category_id');
            $table->index('price');
            $table->index('animal_type');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};