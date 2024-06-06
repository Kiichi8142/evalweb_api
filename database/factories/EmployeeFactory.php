<?php

namespace Database\Factories;

use App\Models\JobTitle;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "firstname" => fake()->firstname(),
            "lastname" => fake()->lastname(),
            "job_title_id" => JobTitle::inRandomOrder()->first()->id,
            "organization_id" => Organization::inRandomOrder()->first()->id
        ];
    }
}
