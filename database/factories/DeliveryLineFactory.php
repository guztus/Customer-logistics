<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryLine>
 */
class DeliveryLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'delivery_id' => Delivery::all()->random()->id,
            'item' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 100),
            'qty' => fake()->numberBetween(1, 10),
        ];
    }
}
