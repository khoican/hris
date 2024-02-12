<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Attendence;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $employees = Employee::pluck('id')->toArray();

        $attendancesData = [];

        foreach ($employees as $employee) {
            for ($day = 1; $day <= 31; $day++) {
                $checkOut = $faker->dateTimeBetween("2023-12-01 07:00:00", "2023-12-01 10:00:00")->format('Y-m-d H:i:s');
                $checkIn = null;

                // Jika random value <= 0.8, maka tentukan check_out
                if (rand(0, 31) > 2) {
                    $checkIn = $faker->dateTimeBetween("2023-12-01 17:00:00", "2023-12-01 20:00:00")->format('Y-m-d H:i:s');
                }

                $attendancesData[] = [
                    'employee_id' => $employee,
                    'date' => "2023-12-$day",
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                ];
            }

            for ($day = 1; $day <= 31; $day++) {
                $checkOut = $faker->dateTimeBetween("2024-01-01 07:00:00", "2024-01-01 10:00:00")->format('Y-m-d H:i:s');
                $checkIn = null;

                // Jika random value <= 0.8, maka tentukan check_out
                if (rand(0, 31) > 2) {
                    $checkIn = $faker->dateTimeBetween("2024-01-01 17:00:00", "2024-01-01 20:00:00")->format('Y-m-d H:i:s');
                }

                $attendancesData[] = [
                    'employee_id' => $employee,
                    'date' => "2024-01-$day",
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                ];
            }
        }

        // Memasukkan data absensi
        Attendence::insert($attendancesData);
    }
}