<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'brand' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'img' => $this->faker->imageUrl(),
            'link' => $this->faker->url,
            'reserved' => $this->faker->boolean,
        ];
    }
}
