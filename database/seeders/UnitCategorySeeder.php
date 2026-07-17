<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'code' => 'DT',
                'name' => 'Dump Truck',
            ],
            [
                'code' => 'EX',
                'name' => 'Excavator',
            ],
            [
                'code' => 'DZ',
                'name' => 'Bulldozer',
            ],
            [
                'code' => 'GR',
                'name' => 'Motor Grader',
            ],
            [
                'code' => 'WT',
                'name' => 'Water Truck',
            ],
            [
                'code' => 'LV',
                'name' => 'Light Vehicle',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\UnitCategory::updateOrCreate(
                ['code' => $category['code']],
                $category
            );
        }
    }
}
