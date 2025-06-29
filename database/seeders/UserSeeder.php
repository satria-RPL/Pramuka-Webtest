<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Satria',
                'email' => 'satria@gmail.com',
                'password' => bcrypt('milenium123')
            ],
            [
                'name' => 'Rival',
                'email' => 'rival@gmail.com',
                'password' => bcrypt('milenium123')
            ],
            [
                'name' => 'Echa',
                'email' => 'echa@gmail.com',
                'password' => bcrypt('milenium123')
            ],
            [
                'name' => 'Devina',
                'email' => 'devina@gmail.com',
                'password' => bcrypt('milenium123')
            ],
        ];

        User::insert($users);
    }
}