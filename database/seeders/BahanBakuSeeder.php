<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanBakus = [
            // Bahan Baku Operational - linked to Master Bahan
            [
                'master_bahan_id' => 1, // Tempurung Kelapa Kering
                'kode_bahan' => 'BB001',
                'nama_bahan' => 'Tempurung Kelapa Kering Batch 001',
                'satuan' => 'kg',
                'harga_per_satuan' => 5000.00,
                'stok' => 2500.00,
                'tanggal_masuk' => now(),
                'tanggal_kadaluarsa' => now()->addMonths(6),
                'status' => 'aktif'
            ],
            [
                'master_bahan_id' => 1, // Tempurung Kelapa Kering
                'kode_bahan' => 'BB002',
                'nama_bahan' => 'Tempurung Kelapa Kering Batch 002',
                'satuan' => 'kg',
                'harga_per_satuan' => 4800.00,
                'stok' => 1800.00,
                'tanggal_masuk' => now()->subDays(30),
                'tanggal_kadaluarsa' => now()->addMonths(5),
                'status' => 'aktif'
            ],
            [
                'master_bahan_id' => 2, // Kayu Bakar
                'kode_bahan' => 'BB003',
                'nama_bahan' => 'Kayu Bakar Jati Batch 001',
                'satuan' => 'kg',
                'harga_per_satuan' => 8000.00,
                'stok' => 1200.00,
                'tanggal_masuk' => now(),
                'tanggal_kadaluarsa' => now()->addMonths(12),
                'status' => 'aktif'
            ],
            [
                'master_bahan_id' => 3, // Bahan Pengikat
                'kode_bahan' => 'BB004',
                'nama_bahan' => 'Bahan Pengikat Kimia Batch 001',
                'satuan' => 'kg',
                'harga_per_satuan' => 12000.00,
                'stok' => 500.00,
                'tanggal_masuk' => now(),
                'tanggal_kadaluarsa' => now()->addMonths(8),
                'status' => 'aktif'
            ],
            [
                'master_bahan_id' => 2, // Kayu Bakar
                'kode_bahan' => 'BB005',
                'nama_bahan' => 'Kayu Bakar Mahoni Batch 002',
                'satuan' => 'kg',
                'harga_per_satuan' => 7500.00,
                'stok' => 800.00,
                'tanggal_masuk' => now()->subDays(15),
                'tanggal_kadaluarsa' => now()->addMonths(11),
                'status' => 'aktif'
            ],
            [
                'master_bahan_id' => 1, // Tempurung Kelapa Kering
                'kode_bahan' => 'BB006',
                'nama_bahan' => 'Tempurung Kelapa Kering Premium',
                'satuan' => 'kg',
                'harga_per_satuan' => 5500.00,
                'stok' => 950.00,
                'tanggal_masuk' => now()->subDays(7),
                'tanggal_kadaluarsa' => now()->addMonths(7),
                'status' => 'aktif'
            ]

        ];

        foreach ($bahanBakus as $bahan) {
            BahanBaku::updateOrCreate(
                ['kode_bahan' => $bahan['kode_bahan']],
                $bahan
            );
        }
    }
}
