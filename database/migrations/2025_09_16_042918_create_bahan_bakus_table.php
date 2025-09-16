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
        Schema::create('bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bahan')->unique();
            $table->string('nama_bahan');
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->nullable();
            $table->string('satuan'); // unit (kg, liter, dll)
            $table->integer('stok')->default(0);
            $table->integer('minimum_stok')->default(0);
            $table->decimal('harga_beli_terakhir', 15, 2)->nullable();
            $table->string('supplier')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_bakus');
    }
};
