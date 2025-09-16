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
        Schema::create('produksis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_produksi')->unique();
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->date('tanggal_produksi');
            $table->integer('jumlah_target');
            $table->integer('jumlah_hasil')->default(0);
            $table->enum('status', ['rencana', 'proses', 'selesai', 'gagal'])->default('rencana');
            $table->decimal('biaya_produksi', 15, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user yang input
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksis');
    }
};
