<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksis';

    protected $fillable = [
        'kode_produksi',
        'tanggal_produksi',
        'produk_id',
        'jumlah_produksi',
        'status'
    ];

    protected $casts = [
        'tanggal_produksi' => 'date',
        'produk_id' => 'integer',
        'jumlah_produksi' => 'decimal:2',
        'status' => 'string'
    ];

    // Relasi dengan Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi dengan ProduksiBahan
    public function produksiBahans()
    {
        return $this->hasMany(ProduksiBahan::class, 'produksi_id');
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];

        return $labels[$this->status] ?? $this->status;
    }

    // Accessor untuk total bahan digunakan
    public function getTotalBahanDigunakanAttribute()
    {
        return $this->produksiBahans->sum('jumlah_digunakan');
    }

    // Scope untuk produksi aktif
    public function scopeAktif($query)
    {
        return $query->whereNotIn('status', ['selesai', 'dibatalkan']);
    }

    // Scope berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
