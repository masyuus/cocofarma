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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->nullable();
            $table->decimal('harga_jual', 15, 2);
            $table->string('satuan'); // unit (kg, pcs, dll)
            $table->integer('stok')->default(0);
            $table->integer('minimum_stok')->default(0);
            $table->string('foto')->nullable();
            $table->boolean('status')->default(true); // aktif/nonaktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
