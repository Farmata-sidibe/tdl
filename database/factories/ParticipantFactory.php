<?php

namespace Database\Factories;

use App\Models\Cagnotte;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'commission' => $this->faker->randomFloat(2, 1, 10),
            'date_contribution' => $this->faker->dateTimeThisYear(),
            'product_id' => Product::factory(),
            'cagnotte_id' => Cagnotte::factory(),
            'status' => 'pending',
        ];
    }
}
