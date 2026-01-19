<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'nama' => 'Admin Bromotrail',
            'email' => 'admin@bromotrail.com',
            'password' => bcrypt('admin123'),
            'role' => 'Super Admin',
        ]);

        echo "✅ Admin user created!\n";
        echo "Email: admin@bromotrail.com\n";
        echo "Password: admin123\n";
    }
}
