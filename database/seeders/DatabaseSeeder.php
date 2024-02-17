<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evaluation;
use App\Models\EvaluationItem;
use Illuminate\Database\Seeder;

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

        // TeacherEvaluation::factory(4)
        //     ->has(EvaluationGroup::factory()->count(2)->has(EvaluationItem::factory(5)), 'topics')
        //     ->create();

        Evaluation::factory(3)->has(EvaluationItem::factory()->count(10))->create();
    }
}
