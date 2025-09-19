<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    protected $table = 'stok_bahan_baku';

    protected $fillable = [
        'bahan_baku_id',
        'jumlah_masuk',
        'jumlah_keluar',
        'sisa_stok',
        'tanggal',
        'keterangan'
    ];

    protected $casts = [
        'bahan_baku_id' => 'integer',
        'jumlah_masuk' => 'decimal:2',
        'jumlah_keluar' => 'decimal:2',
        'sisa_stok' => 'decimal:2',
        'tanggal' => 'date'
    ];

    // Relationship dengan bahan baku
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }

    // Scope untuk stok masuk
    public function scopeStokMasuk($query)
    {
        return $query->where('jumlah_masuk', '>', 0);
    }

    // Scope untuk stok keluar
    public function scopeStokKeluar($query)
    {
        return $query->where('jumlah_keluar', '>', 0);
    }

    // Scope berdasarkan tanggal
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }

    // Scope berdasarkan periode
    public function scopePeriode($query, $tanggalAwal, $tanggalAkhir)
    {
        return $query->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir]);
    }
}