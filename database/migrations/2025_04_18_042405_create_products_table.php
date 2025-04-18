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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id: unsignedBigInteger, Primary Key, Auto-increment
            $table->string('name', 255); // name: string, max 255, required
            $table->string('slug', 255)->unique(); // slug: string, unique
            $table->text('description')->nullable(); // description: text, nullable
            $table->string('sku', 50)->unique(); // sku: string, unique
            $table->decimal('price', 10, 2)->default(0); // price: decimal, default 0
            $table->integer('stock')->default(0); // stock: integer, default 0
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->onDelete('set null')->onUpdate('cascade'); // foreign key
            $table->string('image_url', 255)->nullable(); // image_url: string, nullable
            $table->boolean('is_active')->default(true); // is_active: boolean, default true
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
