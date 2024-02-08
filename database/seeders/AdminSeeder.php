<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    private static $password = null;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('admin123'),
    ]);
    $user->assignRole('passenger', 'admin', 'driver');
    }
}
