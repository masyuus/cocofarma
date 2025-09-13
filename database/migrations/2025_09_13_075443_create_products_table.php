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
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('category', ['arang_kelapa', 'produk_hexa', 'bahan_baku']);
            $table->decimal('price', 15, 2);
            $table->integer('stock_quantity')->default(0);
            $table->string('unit'); // ton, kg, pcs, dll
            $table->decimal('weight_per_unit', 8, 2)->nullable(); // berat per unit dalam kg
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('specifications')->nullable(); // spesifikasi teknis dalam JSON
            $table->decimal('minimum_stock', 8, 2)->default(0);
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
