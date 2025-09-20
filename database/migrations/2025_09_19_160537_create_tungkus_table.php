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
        Schema::create('tungkus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tungku');
            $table->string('kode_tungku')->unique();
            $table->enum('tipe_tungku', ['gas', 'listrik', 'minyak', 'batubara']);
            $table->decimal('kapasitas_max', 10, 2); // dalam kg atau liter
            $table->enum('status', ['aktif', 'maintenance', 'rusak', 'nonaktif'])->default('aktif');
            $table->decimal('biaya_operasional_per_jam', 10, 2)->default(0);
            $table->text('spesifikasi')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tungkus');
    }
};
