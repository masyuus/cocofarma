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
        Schema::create('produksi_bahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produksi_id')->constrained()->onDelete('cascade');
            $table->foreignId('bahan_baku_id')->constrained()->onDelete('cascade');
            $table->decimal('jumlah_digunakan', 10, 3); // bisa desimal untuk kg/liter
            $table->decimal('biaya_bahan', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_bahans');
    }
};
