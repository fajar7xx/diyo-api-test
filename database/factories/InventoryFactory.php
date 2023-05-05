<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->sentence(),
            'price' => fake()->numberBetween(10000, 99999),
            'amount' => fake()->numberBetween(1, 10),
            'unit'  => Arr::random(['pcs', 'unit', 'pack', 'box', 'buat', 'kg', 'gr']),
        ];
    }
}
