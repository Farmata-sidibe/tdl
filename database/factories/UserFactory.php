<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= bcrypt('password'),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'paypal_email' => fake()->safeEmail(),
            'profile_image' => 'default-profile.jpg',
            'cover_image' => 'default-cover.jpg',
            'phone' => '1234567890',
            'country' => 'Country',
            'adress' => '123 Street',
            'code_postal' => '12345',
            'ville' => 'City',
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
