<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\Question;
use App\Models\Section;
use App\Models\Team;
use App\Models\Template;
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
            $employees = Employee::factory(5)->for($team)->create();

            foreach ($employees as $employee) {
                User::factory()->for($employee)->state([
                    "name" => $employee->firstname . " " . $employee->lastname,
                ])->create();
            }
        }

        $teams = Team::all();

        foreach ($teams as $team) {
            $manager = $team->employees->random();
            $team->manager_id = $manager->id;
            $manager->position = "Team Manager";
            $manager->save();
            $team->save();
        }

        $teams = Team::all();

        $sections = Section::factory(3)->create();

        $template = Template::factory()->create();

        foreach ($sections as $section) {
            Question::factory(10)->for($template)->for($section)->create();
        }

        foreach ($teams as $team) {
            $manager = $team->manager_id;
            $emps = $team->employees;
            // make evaluation for manager
            foreach ($emps as $emp) {
                if ($emp->id != $manager) {
                    Evaluation::factory()->for($emp)->for($template)->create([
                        "user_id" => $manager
                    ]);
                }
                // make self assessment
                Evaluation::factory()->for($emp)->for($template)->create([
                    "user_id" => $emp->id
                ]);
            }
        }

        $templates = Template::all();

        foreach ($templates as $template) {
            $evaluations = $template->evaluations;
            foreach ($evaluations as $evaluation) {
                foreach ($template->questions as $question) {
                    $evaluation->sections()->syncWithoutDetaching($question->section);
                    EvaluationItem::factory()->for($question)->for($evaluation)->for($question->section)->create();
                }
            }
        }

        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

    }
}
