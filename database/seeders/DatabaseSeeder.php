<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\User;
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
        User::factory(5)->has(
            Evaluation::factory(3)->hasItems(10)
        )->create();
    }
}
