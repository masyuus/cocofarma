<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'nama_produk', 
        'deskripsi',
        'kategori',
        'harga_jual',
        'satuan',
        'stok',
        'minimum_stok',
        'foto',
        'status'
    ];

    protected $casts = [
        'harga_jual' => 'decimal:2',
        'status' => 'boolean',
    ];

    // Relasi dengan PesananItem
    public function pesananItems()
    {
        return $this->hasMany(PesananItem::class);
    }

    // Relasi dengan TransaksiItem (penjualan)
    public function transaksiItems()
    {
        return $this->hasMany(TransaksiItem::class);
    }

    // Relasi dengan Produksi
    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }
}
