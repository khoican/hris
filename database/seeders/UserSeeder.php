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
        User::create(
            [
                'employee_id' => null,
                'name' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ]
        );
        User::create(
            [
                'employee_id' => null,
                'name' => 'user',
                'password' => bcrypt('user'),
                'role' => 'user'
            ],
        );
    }
}
