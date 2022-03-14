<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductRating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Products rating factory
 */
class ProductRatingFactory extends Factory
{

    /**
     * Faactory model
     *
     * @var ProductRating
     */
    protected $model = ProductRating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => function (array $attributes): int {
                return $attributes['user_id'] ?? User::factory()->id;
            },
            'product_id' => function (array $attributes): int {
                return $attributes['product_id'] ?? Product::factory()->id;
            },
            'rating' => rand(1, 5)
        ];
    }
}
