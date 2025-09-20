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
        Schema::table('stok_bahan_baku', function (Blueprint $table) {
            $table->string('nomor_batch')->nullable()->after('bahan_baku_id');
            $table->string('supplier')->nullable()->after('nomor_batch');
            $table->decimal('harga_satuan', 12, 2)->default(0)->after('sisa_stok');
            $table->date('tanggal_kadaluarsa')->nullable()->after('harga_satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stok_bahan_baku', function (Blueprint $table) {
            $table->dropColumn(['nomor_batch', 'supplier', 'harga_satuan', 'tanggal_kadaluarsa']);
        });
    }
};
