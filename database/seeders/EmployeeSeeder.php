<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $position = Position::pluck('id')->toArray();
        $faker = Factory::create();

        Employee::insert([
            'position_id' => 3,
            'name' => 'Admin',
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,

        ]);
        Employee::insert([
            'position_id' => 1,
            'name' => 'User',
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,

        ]);
    }
}
