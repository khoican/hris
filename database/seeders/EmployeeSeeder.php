<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'position_id' => 1,
            'name' => 'Ibnu Khoirul',
            'email' => 'ibnukhoirul@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Raya no. 1',
        ]);
    }
}