<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sourceable_type' => $model = fake()->randomElement([Vendor::class, User::class]),
            'sourceable_id' => optional((new $model)->query()->inRandomOrder()->first())->id,
            'product_id' => optional(Product::query()->inRandomOrder()->first())->id,
            'address' => fake()->address(),

        ];
    }
}
