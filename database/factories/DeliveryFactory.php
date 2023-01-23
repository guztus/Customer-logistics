<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Client;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'route_id' => Route::all()->random()->id,
            'address_id' => Address::all()->random()->id,
            'type' => fake()->numberBetween(1, 2),
            'status' => fake()->numberBetween(1, 3),
        ];
    }
}
