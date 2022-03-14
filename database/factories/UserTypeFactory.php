<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * UserTypeFactory to create user types
 */
class UserTypeFactory extends Factory
{
    /**
     * Factory model
     *
     * @var UserType
     */
    protected $model = UserType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([UserType::VENDOR_TYPE, UserType::BUYER_TYPE]),
            'description' => $this->faker->text(255)
        ];
    }
}
