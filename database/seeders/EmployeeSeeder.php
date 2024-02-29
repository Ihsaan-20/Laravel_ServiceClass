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
        for($i=0; $i<=10;$i++)
        {
            Employee::create([
                'emp_name' => 'Employee'.$i,
                'emp_dept' => 'Employee depatment'.$i,
                'emp_email' => 'employee'.$i.'@gmail.com',
                'emp_city' => 'City'.$i,
            ]);
        }
    }
}
