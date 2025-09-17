<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_bakus';
    
    protected $fillable = [
        'kode_bahan',
        'nama_bahan',
        'deskripsi',
        'kategori',
        'satuan',
        'stok',
        'minimum_stok',
        'harga_beli_terakhir',
        'supplier',
        'tanggal_kadaluarsa',
        'status'
    ];
    
    protected $casts = [
        'status' => 'boolean',
        'minimum_stok' => 'decimal:2',
        'harga_beli_terakhir' => 'decimal:2',
        'tanggal_kadaluarsa' => 'date'
    ];
    
    // Relationship dengan stok bahan baku
    public function stokBahanBaku()
    {
        return $this->hasMany(StokBahanBaku::class, 'bahan_baku_id');
    }
    
    // Relationship dengan stok tersedia
    public function stokTersedia()
    {
        return $this->hasMany(StokBahanBaku::class, 'bahan_baku_id')->where('tersedia', true);
    }
    
    // Accessor untuk total stok tersedia
    public function getTotalStokAttribute()
    {
        return $this->stokTersedia->sum('quantity');
    }
    
    // Accessor untuk status stok
    public function getStatusStokAttribute()
    {
        $totalStok = $this->stok;
        
        if ($totalStok <= $this->minimum_stok) {
            return 'RENDAH';
        } elseif ($totalStok <= ($this->minimum_stok * 1.5)) {
            return 'SEDANG';
        } else {
            return 'AMAN';
        }
    }
}
