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
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->unique();
            $table->string('reference')->unique();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['active', 'out of stock','archived','on pre-order'])->default('active');
            $table->integer('critical_stock')->default(0);
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tax_id')->constrained('taxes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
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
