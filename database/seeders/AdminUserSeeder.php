<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat atau update user super admin
        User::updateOrCreate([
            'username' => 'lopa123'
        ], [
            'name' => 'Super Admin',
            'email' => 'lopa123@cocofarma.com',
            'password' => Hash::make('lopa123'),
            'role' => 'super_admin',
        ]);
    }
}
