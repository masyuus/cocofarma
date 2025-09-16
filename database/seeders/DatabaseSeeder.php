<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin users
        User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@cocofarma.com',
            'role' => 'super_admin',
            'status' => true,
        ]);

        User::factory()->create([
            'name' => 'Admin Produksi',
            'username' => 'admin',
            'email' => 'admin@cocofarma.com',
            'role' => 'admin',
            'status' => true,
        ]);

        // Run other seeders
        $this->call([
            PengaturanSeeder::class,
            BahanBakuSeeder::class,
            ProdukSeeder::class,
        ]);
    }
}
