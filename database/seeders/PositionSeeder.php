<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = Division::pluck('id')->toArray();

        $positionsData = [];

        foreach ($divisions as $divisionId) {
            $positionsData[] = [
                'name' => 'Manager',
                'salary_per_hour' => 200000,
                'division_id' => $divisionId,
            ];

            $positionsData[] = [
                'name' => 'Staff',
                'salary_per_hour' => 100000,
                'division_id' => $divisionId,
            ];
        }

        Position::insert($positionsData);
    }
}