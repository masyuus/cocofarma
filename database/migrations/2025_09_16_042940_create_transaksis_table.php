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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi')->unique();
            $table->enum('tipe_transaksi', ['penjualan', 'pembelian_bahan']);
            $table->string('nama_pelanggan')->nullable(); // untuk penjualan
            $table->string('nama_supplier')->nullable(); // untuk pembelian bahan
            $table->date('tanggal_transaksi');
            $table->decimal('total_amount', 15, 2);
            $table->decimal('pajak', 15, 2)->default(0);
            $table->decimal('diskon', 15, 2)->default(0);
            $table->decimal('total_bayar', 15, 2);
            $table->enum('metode_bayar', ['tunai', 'transfer', 'kredit']);
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas', 'sebagian'])->default('lunas');
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
