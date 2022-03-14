<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * UserFactory use to create Users
 */
class UserFactory extends Factory
{

    /**
     * Factory model
     *
     * @var User
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name(),
            'email'   => $this->faker->unique()->safeEmail(),
            'type_id' => function (array $attributes): int {
                return $attributes['user_id'] ?? User::factory()->id;
            }
        ];
    }
}
