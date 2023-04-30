<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $faker = Generator::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(10),
            'description' => $this->faker->paragraph,
            'amount' => rand(0, 1000),
            'stock_price' => rand(0, 2000000)
        ];
    }
}
