<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Production;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('seeders/data/production.csv');

        if(! file_exists($file)) {
            $this->command->error("File production.csv not found in seeders directory.");
            return;
        }

        $rows = array_map(
            fn ($line) => str_getcsv($line, ';'),
            file($file)
        );

        $header = array_shift($rows);

        foreach ($rows as $row) {
            $data = array_combine($header, $row);

            Production::updateOrCreate(
                [
                    'production_date' => $data['production_date'],
                    'site_id' => $data['site_id'],
                    'shift_id' => $data['shift_id'],
                    'no_tiket' => $data['no_tiket'],
                    'unit_id' => $data['unit_id'],
                    'employee_id' => $data['employee_id'],
                    'end_time' => $data['end_time'],
                    'bruto' => $data['bruto'],
                    'tara' => $data['tara'],
                    'netto' => $data['netto'],
                    'tonase' => $data['tonase'],
                ]);
        }
    }
}
