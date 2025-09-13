<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Arang Kelapa Premium',
                'code' => 'AK001',
                'description' => 'Arang kelapa berkualitas tinggi dengan kadar air rendah, cocok untuk industri dan rumah tangga.',
                'category' => 'arang_kelapa',
                'price' => 4250000,
                'stock_quantity' => 50,
                'unit' => 'ton',
                'weight_per_unit' => 1000,
                'status' => 'active',
                'minimum_stock' => 10,
                'specifications' => [
                    'Kadar Air' => '< 8%',
                    'Kadar Abu' => '< 3%',
                    'Nilai Kalor' => '> 7000 kcal/kg',
                    'Ukuran' => '2-5 cm'
                ]
            ],
            [
                'name' => 'Arang Kelapa Grade A',
                'code' => 'AK002',
                'description' => 'Arang kelapa grade A dengan kualitas standar ekspor.',
                'category' => 'arang_kelapa',
                'price' => 3850000,
                'stock_quantity' => 75,
                'unit' => 'ton',
                'weight_per_unit' => 1000,
                'status' => 'active',
                'minimum_stock' => 15,
                'specifications' => [
                    'Kadar Air' => '< 10%',
                    'Kadar Abu' => '< 4%',
                    'Nilai Kalor' => '> 6500 kcal/kg',
                    'Ukuran' => '3-8 cm'
                ]
            ],
            [
                'name' => 'Produk Hexa Briket',
                'code' => 'PH001',
                'description' => 'Briket berbentuk hexagonal dari arang kelapa, mudah terbakar dan tahan lama.',
                'category' => 'produk_hexa',
                'price' => 15000,
                'stock_quantity' => 500,
                'unit' => 'kg',
                'weight_per_unit' => 1,
                'status' => 'active',
                'minimum_stock' => 100,
                'specifications' => [
                    'Bentuk' => 'Hexagonal',
                    'Diameter' => '5 cm',
                    'Panjang' => '10 cm',
                    'Kadar Air' => '< 6%',
                    'Waktu Bakar' => '2-3 jam'
                ]
            ],
            [
                'name' => 'Produk Hexa Mini',
                'code' => 'PH002',
                'description' => 'Briket hexa ukuran mini, cocok untuk BBQ dan keperluan rumah tangga.',
                'category' => 'produk_hexa',
                'price' => 18000,
                'stock_quantity' => 300,
                'unit' => 'kg',
                'weight_per_unit' => 1,
                'status' => 'active',
                'minimum_stock' => 50,
                'specifications' => [
                    'Bentuk' => 'Hexagonal Mini',
                    'Diameter' => '3 cm',
                    'Panjang' => '6 cm',
                    'Kadar Air' => '< 5%',
                    'Waktu Bakar' => '1-2 jam'
                ]
            ],
            [
                'name' => 'Tempurung Kelapa Kering',
                'code' => 'BB001',
                'description' => 'Tempurung kelapa kering sebagai bahan baku pembuatan arang.',
                'category' => 'bahan_baku',
                'price' => 1500000,
                'stock_quantity' => 100,
                'unit' => 'ton',
                'weight_per_unit' => 1000,
                'status' => 'active',
                'minimum_stock' => 20,
                'specifications' => [
                    'Kadar Air' => '< 15%',
                    'Ukuran' => 'Utuh/Pecahan',
                    'Kebersihan' => 'Bebas kotoran',
                    'Asal' => 'Kelapa lokal'
                ]
            ],
            [
                'name' => 'Serbuk Arang Kelapa',
                'code' => 'BB002',
                'description' => 'Serbuk arang kelapa untuk campuran briket dan keperluan industri.',
                'category' => 'bahan_baku',
                'price' => 2800000,
                'stock_quantity' => 25,
                'unit' => 'ton',
                'weight_per_unit' => 1000,
                'status' => 'active',
                'minimum_stock' => 5,
                'specifications' => [
                    'Mesh Size' => '80-100',
                    'Kadar Air' => '< 12%',
                    'Kadar Abu' => '< 5%',
                    'Warna' => 'Hitam pekat'
                ]
            ],
            [
                'name' => 'Perekat Tapioka',
                'code' => 'BB003',
                'description' => 'Perekat alami dari tapioka untuk pembuatan briket.',
                'category' => 'bahan_baku',
                'price' => 8500,
                'stock_quantity' => 200,
                'unit' => 'kg',
                'weight_per_unit' => 1,
                'status' => 'active',
                'minimum_stock' => 50,
                'specifications' => [
                    'Jenis' => 'Tapioka murni',
                    'Kemurnian' => '> 95%',
                    'Warna' => 'Putih',
                    'Tekstur' => 'Bubuk halus'
                ]
            ],
            [
                'name' => 'Arang Kelapa Export Quality',
                'code' => 'AK003',
                'description' => 'Arang kelapa kualitas ekspor dengan standar internasional.',
                'category' => 'arang_kelapa',
                'price' => 4750000,
                'stock_quantity' => 30,
                'unit' => 'ton',
                'weight_per_unit' => 1000,
                'status' => 'active',
                'minimum_stock' => 8,
                'specifications' => [
                    'Kadar Air' => '< 6%',
                    'Kadar Abu' => '< 2.5%',
                    'Nilai Kalor' => '> 7500 kcal/kg',
                    'Fixed Carbon' => '> 80%',
                    'Sertifikat' => 'SNI, ISO'
                ]
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}