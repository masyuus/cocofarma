<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengaturan = [
            [
                'key' => 'nama_usaha',
                'value' => 'Cocofarma',
                'type' => 'text',
                'description' => 'Nama usaha/perusahaan'
            ],
            [
                'key' => 'alamat_usaha',
                'value' => 'Jl. Kakao Raya No. 123, Jakarta Selatan',
                'type' => 'text',
                'description' => 'Alamat lengkap usaha'
            ],
            [
                'key' => 'telepon_usaha',
                'value' => '021-12345678',
                'type' => 'text',
                'description' => 'Nomor telepon usaha'
            ],
            [
                'key' => 'email_usaha',
                'value' => 'info@cocofarma.com',
                'type' => 'text',
                'description' => 'Email usaha'
            ],
            [
                'key' => 'logo_usaha',
                'value' => '',
                'type' => 'file',
                'description' => 'Logo usaha/perusahaan'
            ],
            [
                'key' => 'mata_uang',
                'value' => 'IDR',
                'type' => 'text',
                'description' => 'Mata uang yang digunakan'
            ],
            [
                'key' => 'zona_waktu',
                'value' => 'Asia/Jakarta',
                'type' => 'text',
                'description' => 'Zona waktu sistem'
            ],
            [
                'key' => 'pajak_default',
                'value' => '10',
                'type' => 'number',
                'description' => 'Persentase pajak default (%)'
            ],
        ];

        foreach ($pengaturan as $setting) {
            Pengaturan::create($setting);
        }
    }
}
