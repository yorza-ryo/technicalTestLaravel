<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->unique(true)->numberBetween(1, 10),
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'mname' => fake()->firstName(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address()
        ];
    }
}
