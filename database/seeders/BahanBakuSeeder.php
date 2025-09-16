<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanBakus = [
            [
                'kode_bahan' => 'BB-001',
                'nama_bahan' => 'Biji Kakao',
                'deskripsi' => 'Biji kakao pilihan untuk produksi cokelat',
                'kategori' => 'Bahan Utama',
                'satuan' => 'kg',
                'stok' => 500,
                'minimum_stok' => 100,
                'harga_beli_terakhir' => 35000,
                'supplier' => 'CV. Kakao Nusantara',
                'status' => true,
            ],
            [
                'kode_bahan' => 'BB-002',
                'nama_bahan' => 'Gula Pasir',
                'deskripsi' => 'Gula pasir premium untuk campuran cokelat',
                'kategori' => 'Pemanis',
                'satuan' => 'kg',
                'stok' => 300,
                'minimum_stok' => 50,
                'harga_beli_terakhir' => 14000,
                'supplier' => 'PT. Gula Manis',
                'status' => true,
            ],
            [
                'kode_bahan' => 'BB-003',
                'nama_bahan' => 'Susu Bubuk',
                'deskripsi' => 'Susu bubuk full cream untuk cokelat susu',
                'kategori' => 'Dairy',
                'satuan' => 'kg',
                'stok' => 200,
                'minimum_stok' => 40,
                'harga_beli_terakhir' => 85000,
                'supplier' => 'PT. Susu Segar',
                'status' => true,
            ],
            [
                'kode_bahan' => 'BB-004',
                'nama_bahan' => 'Mentega Kakao',
                'deskripsi' => 'Mentega kakao murni untuk tekstur cokelat',
                'kategori' => 'Lemak',
                'satuan' => 'kg',
                'stok' => 150,
                'minimum_stok' => 30,
                'harga_beli_terakhir' => 120000,
                'supplier' => 'CV. Kakao Nusantara',
                'status' => true,
            ],
            [
                'kode_bahan' => 'BB-005',
                'nama_bahan' => 'Vanilla Extract',
                'deskripsi' => 'Ekstrak vanilla murni untuk aroma',
                'kategori' => 'Perasa',
                'satuan' => 'liter',
                'stok' => 50,
                'minimum_stok' => 10,
                'harga_beli_terakhir' => 250000,
                'supplier' => 'PT. Aroma Nusantara',
                'status' => true,
            ],
            [
                'kode_bahan' => 'BB-006',
                'nama_bahan' => 'Kacang Almond',
                'deskripsi' => 'Kacang almond pilihan untuk praline',
                'kategori' => 'Kacang',
                'satuan' => 'kg',
                'stok' => 80,
                'minimum_stok' => 15,
                'harga_beli_terakhir' => 180000,
                'supplier' => 'CV. Kacang Premium',
                'status' => true,
            ],
        ];

        foreach ($bahanBakus as $bahan) {
            BahanBaku::create($bahan);
        }
    }
}
