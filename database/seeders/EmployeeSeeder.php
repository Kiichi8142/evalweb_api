<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (JobTitle::count() > 0) {
            $employees = Employee::factory(10)->create();

            foreach ($employees as $employee) {
                User::factory()->for($employee)->state([
                    "name" => $employee->firstname . " " . $employee->lastname,
                ])->create();
            }
        }
    }
}
