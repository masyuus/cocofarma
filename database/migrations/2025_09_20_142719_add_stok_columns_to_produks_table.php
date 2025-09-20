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
        Schema::table('produks', function (Blueprint $table) {
            $table->integer('stok')->default(0)->after('harga_jual');
            $table->integer('minimum_stok')->default(0)->after('stok');
            $table->string('foto')->nullable()->after('minimum_stok');
            $table->string('kategori')->nullable()->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn(['stok', 'minimum_stok', 'foto', 'kategori']);
        });
    }
};
