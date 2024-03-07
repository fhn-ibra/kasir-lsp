<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => 'admin',
            'level' => 'Admin'
        ]];

        foreach ($data as $d) {
            User::create($d);
        }
    }
}
