<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterBahanBaku;

class MasterBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masters = [
            [
                'kode_bahan' => 'MB001',
                'nama_bahan' => 'Tempurung Kelapa Kering',
                'satuan' => 'kg',
                'harga_per_satuan' => 5000.00,
                'deskripsi' => 'Tempurung kelapa berkualitas untuk pembuatan arang',
                'status' => 'aktif'
            ],
            [
                'kode_bahan' => 'MB002',
                'nama_bahan' => 'Kayu Bakar',
                'satuan' => 'kg',
                'harga_per_satuan' => 8000.00,
                'deskripsi' => 'Kayu bakar berbagai jenis untuk proses produksi',
                'status' => 'aktif'
            ],
            [
                'kode_bahan' => 'MB003',
                'nama_bahan' => 'Bahan Pengikat',
                'satuan' => 'kg',
                'harga_per_satuan' => 12000.00,
                'deskripsi' => 'Bahan pengikat kimia untuk proses pencetakan',
                'status' => 'aktif'
            ],
            [
                'kode_bahan' => 'MB004',
                'nama_bahan' => 'Garam Non-Metal',
                'satuan' => 'kg',
                'harga_per_satuan' => 3000.00,
                'deskripsi' => 'Garam industri untuk proses tertentu',
                'status' => 'aktif'
            ],
            [
                'kode_bahan' => 'MB005',
                'nama_bahan' => 'Serbuk Arang',
                'satuan' => 'kg',
                'harga_per_satuan' => 6000.00,
                'deskripsi' => 'Serbuk arang halus untuk produksi arang aktif',
                'status' => 'aktif'
            ],
            [
                'kode_bahan' => 'MB006',
                'nama_bahan' => 'Air Bersih',
                'satuan' => 'liter',
                'harga_per_satuan' => 2000.00,
                'deskripsi' => 'Air olahan untuk proses pencampuran',
                'status' => 'aktif'
            ]
        ];

        foreach ($masters as $m) {
            MasterBahanBaku::updateOrCreate([
                'kode_bahan' => $m['kode_bahan']
            ], $m);
        }
    }
}
