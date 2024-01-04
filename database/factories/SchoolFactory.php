<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a user
        $user = new User([
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail() ,
            'password' => '12345678',
            'user_type' => 'SCHOOL'
        ]);

        $user->save();

        return [
            'user_id' => $user->id,
            'name' =>  $user->name,
            'email'=> $user->email,
            'town_city' => fake()->city(),
            'address' => fake()->address(),
            'level' => fake()->randomElement(['PRIMARY', 'SECONDARY', 'TERTIARY']),
            'application_url' => fake()->url(),
            'year_established' => fake()->year(),
            'tuition_min' => fake()->randomNumber(2),
            'tuition_max' => fake()->randomNumber(3),
        ];
    }
}
