<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produks = [
            [
                'kode_produk' => 'PRD001',
                'nama_produk' => 'Arang Batok Kelapa Premium 1kg',
                'deskripsi' => 'Arang batok kelapa berkualitas tinggi untuk BBQ dan industri',
                'kategori' => 'Arang Batok',
                'harga_jual' => 25000.00,
                'stok' => 150,
                'minimum_stok' => 50,
                'satuan' => 'kg',
                'status' => true
            ],
            [
                'kode_produk' => 'PRD002',
                'nama_produk' => 'Asap Cair Batok Kelapa 500ml',
                'deskripsi' => 'Asap cair alami dari batok kelapa untuk pengawet makanan',
                'kategori' => 'Asap Cair',
                'harga_jual' => 35000.00,
                'stok' => 80,
                'minimum_stok' => 25,
                'satuan' => 'botol',
                'status' => true
            ],
            [
                'kode_produk' => 'PRD003',
                'nama_produk' => 'Arang Aktif Batok Kelapa 500g',
                'deskripsi' => 'Arang aktif untuk filter air dan pengolahan limbah',
                'kategori' => 'Arang Aktif',
                'harga_jual' => 45000.00,
                'stok' => 45,
                'minimum_stok' => 15,
                'satuan' => 'kg',
                'status' => true
            ],
            [
                'kode_produk' => 'PRD004',
                'nama_produk' => 'Asap Cair Batok Kelapa 1L',
                'deskripsi' => 'Asap cair kemasan besar untuk industri pengolahan makanan',
                'kategori' => 'Asap Cair',
                'harga_jual' => 65000.00,
                'stok' => 120,
                'minimum_stok' => 40,
                'satuan' => 'botol',
                'status' => true
            ],
            [
                'kode_produk' => 'PRD005',
                'nama_produk' => 'Arang Batok Kelapa BBQ 2kg',
                'deskripsi' => 'Arang batok kelapa khusus untuk BBQ dengan daya bakar lama',
                'kategori' => 'Arang Batok',
                'harga_jual' => 45000.00,
                'stok' => 95,
                'minimum_stok' => 30,
                'satuan' => 'kg',
                'status' => true
            ]
        ];

        foreach ($produks as $produk) {
            Produk::updateOrCreate(
                ['kode_produk' => $produk['kode_produk']],
                $produk
            );
        }
    }
}
