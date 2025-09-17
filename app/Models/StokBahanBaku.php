<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    protected $table = 'stok_bahan_baku';
    
    protected $fillable = [
        'bahan_baku_id',
        'nomor_batch',
        'quantity',
        'harga_satuan',
        'tanggal_masuk',
        'tanggal_kadaluarsa',
        'tersedia'
    ];
    
    protected $casts = [
        'quantity' => 'decimal:2',
        'harga_satuan' => 'decimal:2',
        'tanggal_masuk' => 'date',
        'tanggal_kadaluarsa' => 'date',
        'tersedia' => 'boolean'
    ];
    
    // Relationship dengan bahan baku
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
}