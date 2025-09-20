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
        Schema::table('produksi_bahans', function (Blueprint $table) {
            if (!Schema::hasColumn('produksi_bahans', 'stok_bahan_baku_id')) {
                $table->unsignedBigInteger('stok_bahan_baku_id')->nullable()->after('bahan_baku_id');
            }
            if (!Schema::hasColumn('produksi_bahans', 'harga_satuan')) {
                $table->decimal('harga_satuan', 12, 2)->default(0)->after('jumlah_digunakan');
            }
            if (!Schema::hasColumn('produksi_bahans', 'total_biaya')) {
                $table->decimal('total_biaya', 15, 2)->default(0)->after('harga_satuan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produksi_bahans', function (Blueprint $table) {
            $table->dropColumn(['stok_bahan_baku_id', 'harga_satuan', 'total_biaya']);
        });
    }
};
