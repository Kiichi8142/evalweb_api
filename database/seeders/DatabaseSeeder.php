<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $teams = Team::factory(5)->create();

        foreach ($teams as $team) {
            Employee::factory(5)->for($team)->has(User::factory(1))->create();
        }

        $teams = Team::all();

        foreach ($teams as $team) {
            $manager = $team->employees->random();
            $team->manager_id = $manager->id;
            $team->save();
        }

        $teams = Team::all();

        foreach ($teams as $team) {
            $manager = $team->manager_id;
            $emps = $team->employees;
            // make evaluation for manager
            foreach ($emps as $emp) {
                Evaluation::factory()->for($emp)->hasItems(10)->create([
                    "user_id" => $manager
                ]);
                Evaluation::factory()->for($emp)->hasItems(10)->create([
                    "user_id" => $emp->id
                ]);
            }
        }

    }
}
