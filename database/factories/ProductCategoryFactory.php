<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory to create Products categories
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Factory model
     *
     * @var ProductCategory
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->randomElement(['Cell Phones', 'Computers']),
            'description' => $this->faker->text(255)
        ];
    }
}
