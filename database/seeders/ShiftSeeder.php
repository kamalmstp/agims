<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shifts = [
            [
                'code' => 'I',
                'name' => 'Day',
                'start_time' => '07:00:00',
                'end_time' => '19:00:00',
            ],
            [
                'code' => 'II',
                'name' => 'Night',
                'start_time' => '19:00:00',
                'end_time' => '07:00:00',
            ],
        ];

        foreach ($shifts as $shift) {
            \App\Models\Shift::updateOrCreate(
                ['code' => $shift['code']],
                $shift
            );
        }
    }
}
