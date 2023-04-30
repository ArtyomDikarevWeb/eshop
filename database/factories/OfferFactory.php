<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
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
        $randomId = rand(1, 20);
        return [
            'product_id' => $randomId,
            'title' => Str::random(10) . ' ' . Product::query()->select('name')->where('id', '=', $randomId)->first()->name,
            'price' => Product::query()->select('stock_price')->where('id', '=', $randomId)->first()->stock_price * 1.3
        ];
    }
}
