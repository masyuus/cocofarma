<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produks = [
            [
                'kode_produk' => 'COCO-001',
                'nama_produk' => 'Cokelat Batang Premium',
                'deskripsi' => 'Cokelat batang premium dengan kandungan kakao tinggi',
                'kategori' => 'Cokelat Batang',
                'harga_jual' => 25000,
                'satuan' => 'pcs',
                'stok' => 100,
                'minimum_stok' => 20,
                'status' => true,
            ],
            [
                'kode_produk' => 'COCO-002',
                'nama_produk' => 'Cokelat Bubuk Murni',
                'deskripsi' => 'Bubuk cokelat murni untuk minuman dan kue',
                'kategori' => 'Cokelat Bubuk',
                'harga_jual' => 45000,
                'satuan' => 'kg',
                'stok' => 50,
                'minimum_stok' => 10,
                'status' => true,
            ],
            [
                'kode_produk' => 'COCO-003',
                'nama_produk' => 'Cokelat Susu Tablet',
                'deskripsi' => 'Cokelat susu dalam bentuk tablet siap konsumsi',
                'kategori' => 'Cokelat Tablet',
                'harga_jual' => 15000,
                'satuan' => 'pcs',
                'stok' => 200,
                'minimum_stok' => 50,
                'status' => true,
            ],
            [
                'kode_produk' => 'COCO-004',
                'nama_produk' => 'Cokelat Truffle',
                'deskripsi' => 'Cokelat truffle mewah dengan berbagai rasa',
                'kategori' => 'Cokelat Premium',
                'harga_jual' => 75000,
                'satuan' => 'box',
                'stok' => 30,
                'minimum_stok' => 5,
                'status' => true,
            ],
            [
                'kode_produk' => 'COCO-005',
                'nama_produk' => 'Cokelat Praline',
                'deskripsi' => 'Cokelat praline dengan isian kacang dan karamel',
                'kategori' => 'Cokelat Premium',
                'harga_jual' => 65000,
                'satuan' => 'box',
                'stok' => 25,
                'minimum_stok' => 8,
                'status' => true,
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
