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
            // Bahan Baku Operational - Bahan Produksi
            [
                'kode_bahan' => 'BB001',
                'nama_bahan' => 'Tempurung Kelapa Kering',
                'kategori' => 'Operational',
                'deskripsi' => 'Tempurung kelapa yang telah dikeringkan untuk produksi arang',
                'satuan' => 'kg',
                'stok' => 2500,
                'minimum_stok' => 1000,
                'harga_beli_terakhir' => 1500.00,
                'supplier' => 'PT Kelapa Nusantara',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB002',
                'nama_bahan' => 'Asam Sitrat',
                'kategori' => 'Operational',
                'deskripsi' => 'Bahan kimia untuk proses pembuatan asap cair',
                'satuan' => 'kg',
                'stok' => 180,
                'minimum_stok' => 75,
                'harga_beli_terakhir' => 25000.00,
                'supplier' => 'PT Kimia Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB003',
                'nama_bahan' => 'Natrium Hidroksida (NaOH)',
                'kategori' => 'Operational',
                'deskripsi' => 'Kapur api untuk proses aktivasi arang',
                'satuan' => 'kg',
                'stok' => 320,
                'minimum_stok' => 150,
                'harga_beli_terakhir' => 8000.00,
                'supplier' => 'PT Kimia Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB004',
                'nama_bahan' => 'Asam Klorida (HCl)',
                'kategori' => 'Operational',
                'deskripsi' => 'Asam untuk proses pencucian arang aktif',
                'satuan' => 'liter',
                'stok' => 400,
                'minimum_stok' => 200,
                'harga_beli_terakhir' => 5000.00,
                'supplier' => 'PT Kimia Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB005',
                'nama_bahan' => 'Karbon Aktif Powder',
                'kategori' => 'Operational',
                'deskripsi' => 'Bahan baku untuk pembuatan arang aktif',
                'satuan' => 'kg',
                'stok' => 150,
                'minimum_stok' => 80,
                'harga_beli_terakhir' => 12000.00,
                'supplier' => 'PT Karbon Aktif Indonesia',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB006',
                'nama_bahan' => 'Garam Industri',
                'kategori' => 'Operational',
                'deskripsi' => 'Natrium klorida untuk proses pengasapan',
                'satuan' => 'kg',
                'stok' => 500,
                'minimum_stok' => 250,
                'harga_beli_terakhir' => 300.00,
                'supplier' => 'PT Garam Nusantara',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB007',
                'nama_bahan' => 'Cuka Kayu',
                'kategori' => 'Operational',
                'deskripsi' => 'Asam asetat untuk proses asap cair',
                'satuan' => 'liter',
                'stok' => 280,
                'minimum_stok' => 120,
                'harga_beli_terakhir' => 7500.00,
                'supplier' => 'PT Kimia Organik',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB008',
                'nama_bahan' => 'Batu Bara',
                'kategori' => 'Operational',
                'deskripsi' => 'Bahan bakar untuk proses pembakaran',
                'satuan' => 'kg',
                'stok' => 2000,
                'minimum_stok' => 1000,
                'harga_beli_terakhir' => 400.00,
                'supplier' => 'PT Tambang Indonesia',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB009',
                'nama_bahan' => 'Sulfur',
                'kategori' => 'Operational',
                'deskripsi' => 'Belerang untuk proses pengaktifan',
                'satuan' => 'kg',
                'stok' => 350,
                'minimum_stok' => 175,
                'harga_beli_terakhir' => 6000.00,
                'supplier' => 'PT Kimia Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'BB010',
                'nama_bahan' => 'Kaporit',
                'kategori' => 'Operational',
                'deskripsi' => 'Kalsium hipoklorit untuk sterilisasi',
                'satuan' => 'kg',
                'stok' => 420,
                'minimum_stok' => 180,
                'harga_beli_terakhir' => 4500.00,
                'supplier' => 'PT Kimia Industri',
                'status' => true
            ],

            // Bahan Baku Master - Kemasan dan Peralatan
            [
                'kode_bahan' => 'MB001',
                'nama_bahan' => 'Kantong Plastik 1kg',
                'kategori' => 'Master',
                'deskripsi' => 'Kemasan plastik untuk arang batok kelapa',
                'satuan' => 'pcs',
                'stok' => 2500,
                'minimum_stok' => 1000,
                'harga_beli_terakhir' => 250.00,
                'supplier' => 'PT Kemasan Plastik',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB002',
                'nama_bahan' => 'Botol Asap Cair 500ml',
                'kategori' => 'Master',
                'deskripsi' => 'Botol kaca untuk asap cair batok kelapa',
                'satuan' => 'pcs',
                'stok' => 800,
                'minimum_stok' => 300,
                'harga_beli_terakhir' => 1500.00,
                'supplier' => 'PT Botol Kaca Indonesia',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB003',
                'nama_bahan' => 'Label Produk Custom',
                'kategori' => 'Master',
                'deskripsi' => 'Label kemasan dengan branding Cocofarma',
                'satuan' => 'lembar',
                'stok' => 1500,
                'minimum_stok' => 500,
                'harga_beli_terakhir' => 50.00,
                'supplier' => 'PT Labelindo',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB004',
                'nama_bahan' => 'Mesin Karbonisasi',
                'kategori' => 'Master',
                'deskripsi' => 'Mesin untuk proses karbonisasi tempurung kelapa',
                'satuan' => 'unit',
                'stok' => 3,
                'minimum_stok' => 2,
                'harga_beli_terakhir' => 15000000.00,
                'supplier' => 'PT Mesin Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB005',
                'nama_bahan' => 'Mesin Destilasi Asap Cair',
                'kategori' => 'Master',
                'deskripsi' => 'Mesin untuk proses destilasi asap cair',
                'satuan' => 'unit',
                'stok' => 2,
                'minimum_stok' => 1,
                'harga_beli_terakhir' => 8500000.00,
                'supplier' => 'PT Mesin Industri',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB006',
                'nama_bahan' => 'Filter HEPA',
                'kategori' => 'Master',
                'deskripsi' => 'Filter udara untuk sistem ventilasi',
                'satuan' => 'pcs',
                'stok' => 2000,
                'minimum_stok' => 800,
                'harga_beli_terakhir' => 15000.00,
                'supplier' => 'PT Filter Indonesia',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB007',
                'nama_bahan' => 'Box Kardus 25x15x10cm',
                'kategori' => 'Master',
                'deskripsi' => 'Box kardus untuk kemasan ekspor',
                'satuan' => 'pcs',
                'stok' => 1200,
                'minimum_stok' => 400,
                'harga_beli_terakhir' => 800.00,
                'supplier' => 'PT Kemasan Karton',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB008',
                'nama_bahan' => 'Desiccant Sachet',
                'kategori' => 'Master',
                'deskripsi' => 'Sachet pengering untuk kemasan',
                'satuan' => 'pcs',
                'stok' => 3000,
                'minimum_stok' => 1000,
                'harga_beli_terakhir' => 50.00,
                'supplier' => 'PT Kemasan Plastik',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB009',
                'nama_bahan' => 'Timbangan Digital 50kg',
                'kategori' => 'Master',
                'deskripsi' => 'Timbangan digital kapasitas 50kg',
                'satuan' => 'unit',
                'stok' => 5,
                'minimum_stok' => 3,
                'harga_beli_terakhir' => 750000.00,
                'supplier' => 'PT Alat Ukur',
                'status' => true
            ],
            [
                'kode_bahan' => 'MB010',
                'nama_bahan' => 'Masker N95 Industri',
                'kategori' => 'Master',
                'deskripsi' => 'Masker pelindung untuk proses produksi',
                'satuan' => 'pcs',
                'stok' => 1000,
                'minimum_stok' => 500,
                'harga_beli_terakhir' => 2500.00,
                'supplier' => 'PT APD Industri',
                'status' => true
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
