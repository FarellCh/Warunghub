<?php

namespace Database\Seeders;

use App\Models\accounts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        accounts::updateOrCreate(
            ['email' => 'admin@warung.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true
            ]
        );
    }
}
