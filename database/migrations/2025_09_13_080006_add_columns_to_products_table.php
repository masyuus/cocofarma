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
        Schema::table('products', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('products', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('products', 'code')) {
                $table->string('code')->unique()->after('name');
            }
            if (!Schema::hasColumn('products', 'description')) {
                $table->text('description')->nullable()->after('code');
            }
            if (!Schema::hasColumn('products', 'category')) {
                $table->enum('category', ['arang_kelapa', 'produk_hexa', 'bahan_baku'])->after('description');
            }
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 15, 2)->after('category');
            }
            if (!Schema::hasColumn('products', 'stock_quantity')) {
                $table->integer('stock_quantity')->default(0)->after('price');
            }
            if (!Schema::hasColumn('products', 'unit')) {
                $table->string('unit')->after('stock_quantity');
            }
            if (!Schema::hasColumn('products', 'weight_per_unit')) {
                $table->decimal('weight_per_unit', 8, 2)->nullable()->after('unit');
            }
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('weight_per_unit');
            }
            if (!Schema::hasColumn('products', 'status')) {
                $table->enum('status', ['active', 'inactive'])->default('active')->after('image');
            }
            if (!Schema::hasColumn('products', 'specifications')) {
                $table->json('specifications')->nullable()->after('status');
            }
            if (!Schema::hasColumn('products', 'minimum_stock')) {
                $table->decimal('minimum_stock', 8, 2)->default(0)->after('specifications');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'name', 'code', 'description', 'category', 'price', 
                'stock_quantity', 'unit', 'weight_per_unit', 'image', 
                'status', 'specifications', 'minimum_stock'
            ]);
        });
    }
};