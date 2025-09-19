<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduksiBahan extends Model
{
    protected $table = 'produksi_bahans';

    protected $fillable = [
        'produksi_id',
        'bahan_baku_id',
        'jumlah_digunakan'
    ];

    protected $casts = [
        'produksi_id' => 'integer',
        'bahan_baku_id' => 'integer',
        'jumlah_digunakan' => 'decimal:2'
    ];

    // Relasi dengan Produksi
    public function produksi()
    {
        return $this->belongsTo(Produksi::class, 'produksi_id');
    }

    // Relasi dengan BahanBaku
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
}
