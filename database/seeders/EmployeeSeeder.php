<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('seeders/data/employees.csv');

        if(! file_exists($file)) {
            $this->command->error("File employees.csv not found in seeders directory.");
            return;
        }

        $rows = array_map(
            fn ($line) => str_getcsv($line, ';'),
            file($file)
        );

        $header = array_shift($rows);

        foreach ($rows as $row) {
            $data = array_combine($header, $row);

            Employee::updateOrCreate(
                [
                    'company_id' => $data['company_id'],
                    'department_id' => $data['department_id'],
                    'position_id' => $data['position_id'],
                    'code' => $data['code'],
                    'nik' => $data['nik'],
                    'name' => $data['name'],
                    'nick_name' => $data['nick_name'],
                    'join_date' => $data['join_date'],
                    'is_active' => $data['is_active'],
                ]);
        }
    }
}
