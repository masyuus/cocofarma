<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'category',
        'price',
        'stock_quantity',
        'unit',
        'weight_per_unit',
        'image',
        'status',
        'specifications',
        'minimum_stock'
    ];

    protected $casts = [
        'specifications' => 'array',
        'price' => 'decimal:2',
        'weight_per_unit' => 'decimal:2',
        'minimum_stock' => 'decimal:2'
    ];

    // Accessor untuk kategori dalam bahasa Indonesia
    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'arang_kelapa' => 'Arang Kelapa',
            'produk_hexa' => 'Produk Hexa',
            'bahan_baku' => 'Bahan Baku',
            default => $this->category
        };
    }

    // Accessor untuk status dalam bahasa Indonesia
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'active' => 'Aktif',
            'inactive' => 'Tidak Aktif',
            default => $this->status
        };
    }

    // Check apakah stok rendah
    public function getIsLowStockAttribute()
    {
        return $this->stock_quantity <= $this->minimum_stock;
    }

    // Format harga
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Scope untuk produk aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk stok rendah
    public function scopeLowStock($query)
    {
        return $query->whereRaw('stock_quantity <= minimum_stock');
    }
}