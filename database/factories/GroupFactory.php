<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_name' => fake()->company(),
            'leader' => fake()->name(),
            'address' => fake()->address(),
            'contact_number' => fake()->phoneNumber(),
            'meeting' => fake()->dayOfWeek(),
        ];
    }
}
