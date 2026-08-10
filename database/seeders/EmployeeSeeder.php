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

        $rows = array_map('str_getcsv', file($file));

        $header = array_shift($rows);

        foreach ($rows as $row) {
            $data = array_combine($header, $row);

            Employee::create([
                'company_id' => $data['company_id'],
                'department_id' => $data['department_id'],
                'position_id' => $data['position_id'],
                'code' => $data['code'],
                'nik' => $data['nik'],
                'name' => $data['name'],
                'nick_name' => $data['nick_name'],
                'birth_date' => $data['birth_date'],
                'join_date' => $data['join_date'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zip' => $data['zip'],
                'country' => $data['country'],
                'photo' => $data['photo'],
                'is_active' => $data['is_active'],
            ]);
        }
    }
}
