<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
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
            'category_id' => Category::inRandomOrder()->first(),
            'description' => $this->faker->text(),
            'image' => $this->faker->url(),
            'title' => $this->faker->sentence(1),
            'amount' => $this->faker->numberBetween(10, 1000),
            'price' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
