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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan')->unique();
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan')->nullable();
            $table->string('telepon_pelanggan')->nullable();
            $table->text('alamat_pelanggan')->nullable();
            $table->date('tanggal_pesanan');
            $table->date('tanggal_deadline');
            $table->enum('status', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->decimal('total_harga', 15, 2);
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user yang buat pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
