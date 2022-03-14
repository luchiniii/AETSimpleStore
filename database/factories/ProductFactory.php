<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    /**
     * Factory model
     *
     * @var Product
     */
    protected $model = Product::class;

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
            'category_id' => function (array $attributes): int {
                return $attributes['category_id'] ?? ProductCategory::factory()->id;
            },
            'name'        => $this->faker->company,
            'description' => $this->faker->text,
            'price'       => $this->faker->randomFloat(1, 1, 9)
        ];
    }
}
