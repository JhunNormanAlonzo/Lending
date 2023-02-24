<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanOfficer>
 */
class LoanOfficerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'address' => fake()->address(),
            'gender' => fake()->randomElement(['male', 'female']),
            'contact_number' => fake()->numerify('###########'),
            'position_id' => fake()->numberBetween($min = 1, $max = 7),
        ];
    }
}
