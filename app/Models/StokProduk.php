<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokProduk extends Model
{
    use HasFactory;

    protected $table = 'stok_produks';

    protected $fillable = [
        'produk_id',
        'batch_produksi_id',
        'jumlah_masuk',
        'jumlah_keluar',
        'sisa_stok',
        'harga_satuan',
        'grade_kualitas',
        'tanggal_kadaluarsa',
        'tanggal',
        'keterangan'
    ];

    protected $casts = [
        'produk_id' => 'integer',
        'batch_produksi_id' => 'integer',
        'jumlah_masuk' => 'decimal:2',
        'jumlah_keluar' => 'decimal:2',
        'sisa_stok' => 'decimal:2',
        'harga_satuan' => 'decimal:2',
        'tanggal' => 'date',
        'tanggal_kadaluarsa' => 'date'
    ];

    // Relasi dengan Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi dengan BatchProduksi
    public function batchProduksi()
    {
        return $this->belongsTo(BatchProduksi::class, 'batch_produksi_id');
    }

    // Accessor untuk HPP per unit
    public function getHppPerUnitAttribute()
    {
        return $this->sisa_stok > 0 ? $this->harga_satuan : 0;
    }

    // Accessor untuk status kadaluarsa
    public function getStatusKadaluarsaAttribute()
    {
        if (!$this->tanggal_kadaluarsa) {
            return 'Tidak ada batas kadaluarsa';
        }

        $hariSekarang = now()->startOfDay();
        $hariKadaluarsa = $this->tanggal_kadaluarsa->startOfDay();

        if ($hariKadaluarsa->isPast()) {
            return 'Kadaluarsa';
        } elseif ($hariKadaluarsa->diffInDays($hariSekarang) <= 30) {
            return 'Akan kadaluarsa';
        } else {
            return 'Masih aman';
        }
    }

    // Scope untuk stok tersedia (sisa_stok > 0)
    public function scopeTersedia($query)
    {
        return $query->where('sisa_stok', '>', 0);
    }

    // Scope untuk grade tertentu
    public function scopeGrade($query, $grade)
    {
        return $query->where('grade_kualitas', $grade);
    }

    // Scope untuk produk tertentu
    public function scopeProduk($query, $produkId)
    {
        return $query->where('produk_id', $produkId);
    }

    // Accessor untuk grade label
    public function getGradeLabelAttribute()
    {
        $labels = [
            'A' => 'Premium',
            'B' => 'Standard',
            'C' => 'Below Standard'
        ];

        return $labels[$this->grade_kualitas] ?? $this->grade_kualitas;
    }

    // Accessor untuk total nilai stok
    public function getTotalNilaiAttribute()
    {
        return $this->sisa_stok * $this->harga_satuan;
    }

    // Method untuk mengurangi stok
    public function kurangiStok($jumlah)
    {
        if ($this->sisa_stok >= $jumlah) {
            $this->increment('jumlah_keluar', $jumlah);
            $this->decrement('sisa_stok', $jumlah);
            return true;
        }
        return false;
    }

    // Method untuk menambah stok
    public function tambahStok($jumlah)
    {
        $this->increment('jumlah_masuk', $jumlah);
        $this->increment('sisa_stok', $jumlah);
    }

    // Scope untuk stok yang akan kadaluarsa
    public function scopeAkanKadaluarsa($query, $days = 30)
    {
        return $query->where('tanggal_kadaluarsa', '<=', now()->addDays($days))
                    ->where('tanggal_kadaluarsa', '>=', now());
    }
}
