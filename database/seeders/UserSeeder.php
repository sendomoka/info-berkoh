<?php

namespace Database\Seeders;
use \App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Petugas',
                'username' => 'petugas',
                'password' => bcrypt('petugas'),
                'role' => 'petugas',
            ],
        ];
        
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
