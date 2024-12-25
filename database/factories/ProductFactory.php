<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Losowa nazwa produktu
            'price' => $this->faker->randomFloat(2, 10, 500), // Cena od 10 do 500 PLN
            'quantity' => $this->faker->numberBetween(1, 100), // Ilość od 1 do 100
        ];
    }
}
