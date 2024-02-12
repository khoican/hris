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
        foreach (range(1, 10) as $index) {
            Employee::insert(
                [
                    'position_id' => $position[array_rand($position)],
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address,
                ]
            );
        }

        Employee::insert([
            'position_id' => $position[array_rand($position)],
            'name' => 'Oktavia Pratami Putri',
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,

        ]);
    }
}
