<?php

namespace Database\Factories;

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
            "position" => fake()->randomElement(['Software Engineer', 'Data Analyst', 'Sales', 'Intern', 'Software Architect'])
        ];
    }
}
