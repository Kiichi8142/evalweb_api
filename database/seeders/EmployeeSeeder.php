<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (JobTitle::count() > 0) {
            Employee::factory(10)->create();
        }
    }
}
